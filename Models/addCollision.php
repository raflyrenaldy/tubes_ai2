<?php
  
  set_time_limit(0);

    miningC45('', '');
//---------- KUMPULAN FUNGSI YANG AKAN DILAKUKAN DALAM PROSES MINING ----------
function miningC45($atribut, $nilai_atribut)
{
    perhitunganC45($atribut, $nilai_atribut);
    insertAtributPohonKeputusan($atribut, $nilai_atribut);
    getInfGainMax($atribut, $nilai_atribut);
    replaceNull();
}

//#1# Hapus semua DB dan insert default atribut dan nilai atribut
function populateDb() 
{
mysqli_query("TRUNCATE mining_c45");
mysqli_query("TRUNCATE iterasi_c45");
mysqli_query("TRUNCATE pohon_keputusan_c45");
 populateAtribut();
}

 function populateAtribut() 
 { $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
     mysqli_query($con,"TRUNCATE atribut");
     mysqli_query($con,"INSERT INTO atribut (atribut, nilai_atribut) VALUES ('total', 'total'),
( 'Workclass', 'Federal-gov'),
( 'Workclass', 'Local-gov'),
( 'Workclass', 'Private'),
( 'Workclass', 'Self-emp-inc'),
( 'Workclass', 'Self-emp-not-inc'),
( 'Workclass', 'State-gov'),
( 'Workclass', 'Without-pay'),
( 'Education', '10th'),
( 'Education', '11th'),
( 'Education', '12th'),
( 'Education', '1st-4th'),
( 'Education', '5th-6th'),
( 'Education', '7th-8th'),
( 'Education', '9th'),
( 'Education', 'Assoc-acdm'),
( 'Education', 'Assoc-voc'),
( 'Education', 'Bachelors'),
( 'Education', 'Doctorate'),
( 'Education', 'HS-grad'),
( 'Education', 'Masters'),
( 'Education', 'Preschool'),
( 'Education', 'Prof-school'),
( 'Education', 'Some-college'),
( 'education_num', '2'),
( 'education_num', '3'),
( 'education_num', '4'),
( 'education_num', '5'),
( 'education_num', '6'),
( 'education_num', '7'),
( 'education_num', '8'),
( 'education_num', '9'),
( 'education_num', '10'),
( 'education_num', '11'),
( 'education_num', '12'),
( 'education_num', '13'),
( 'education_num', '14'),
( 'education_num', '15'),
( 'education_num', '16'),
( 'education_num', '1'),
( 'marital_status', 'Divorced'),
( 'marital_status', 'Married-AF-spouse'),
( 'marital_status', 'Married-civ-spouse'),
( 'marital_status', 'Married-spouse-absent'),
( 'marital_status', 'Never-married'),
( 'marital_status', 'Separated'),
( 'marital_status', 'Widowed'),
( 'Occupation', 'Adm-clerical'),
( 'Occupation', 'Armed-Forces'),
( 'Occupation', 'Craft-repair'),
( 'Occupation', 'Exec-managerial'),
( 'Occupation', 'Farming-fishing'),
( 'Occupation', 'Handlers-cleaners'),
( 'Occupation', 'Machine-op-inspct'),
( 'Occupation', 'Other-service'),
( 'Occupation', 'Priv-house-serv'),
( 'Occupation', 'Prof-specialty'),
( 'Occupation', 'Protective-serv'),
( 'Occupation', 'Sales'),
( 'Occupation', 'Tech-support'),
( 'Occupation', 'Transport-moving'),
( 'Relationship', 'Husband'),
('Relationship', 'Not-in-family'),
( 'Relationship', 'Other-relative'),
( 'Relationship', 'Own-child'),
( 'Relationship', 'Unmarried'),
( 'Relationship', 'Wife'),
( 'Race', 'Amer-Indian-Eskimo'),
( 'Race', 'Asian-Pac-Islander'),
( 'Race', 'Black'),
( 'Race', 'Other'),
( 'Race', 'White'),
( 'Sex', 'Female'),
( 'Sex', 'Male')");
 }

// ================ FUNGSI PERHITUNGAN C45 =================
function perhitunganC45($atribut, $nilai_atribut) 
{
       $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
    if (empty($atribut) AND empty($nilai_atribut)) {
     

//#2# Jika atribut yg diinputkan kosong, maka lakukan perhitungan awal
        $kondisiAtribut = ""; // set kondisi atribut kosong
    } else if (!empty($atribut) AND !empty($nilai_atribut)) { 
        // jika atribut tdk kosong, maka select kondisi atribut dari DB
        $sqlKondisiAtribut = mysqli_query($con,"SELECT kondisi_atribut FROM pohon_keputusan_c45 WHERE atribut = '$atribut' AND nilai_atribut = '$nilai_atribut' order by id DESC LIMIT 1");
        $rowKondisiAtribut = mysqli_fetch_assoc($sqlKondisiAtribut);
        $kondisiAtribut = str_replace("~", "'", $rowKondisiAtribut['kondisi_atribut']); // replace string ~ menjadi '
    } 
    
    // ambil seluruh atribut
    $sqlAtribut = mysqli_query($con,'SELECT distinct atribut FROM atribut');
    while($rowGetAtribut = mysqli_fetch_assoc($sqlAtribut)) {
        $getAtribut = $rowGetAtribut['atribut'];
        if ($getAtribut === 'total') { 
//#3# Jika atribut = total, maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak
            // hitung jumlah kasus total
            $sqlJumlahKasusTotal = mysqli_query($con,"SELECT COUNT(*) as jumlah_total FROM sample2 WHERE income is not null $kondisiAtribut");
            $rowJumlahKasusTotal = mysqli_fetch_assoc($sqlJumlahKasusTotal);
            $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

            // hitung jumlah kasus layak
            $sqlJumlahKasusLayak = mysqli_query($con,"SELECT COUNT(*) as jumlah_layak FROM sample2 WHERE income = '>50k' AND income is not null $kondisiAtribut");
            $rowJumlahKasusLayak = mysqli_fetch_assoc($sqlJumlahKasusLayak);
            $getJumlahKasusLayak = $rowJumlahKasusLayak['jumlah_layak'];

            // hitung jumlah kasus tdk layak
            $sqlJumlahKasusTidakLayak = mysqli_query($con,"SELECT COUNT(*) as jumlah_tidak_layak FROM sample2 WHERE income = '<=50k' AND income is not null $kondisiAtribut");
            $rowJumlahKasusTidakLayak = mysqli_fetch_assoc($sqlJumlahKasusTidakLayak);
            $getJumlahKasusTidakLayak = $rowJumlahKasusTidakLayak['jumlah_tidak_layak'];

//#4# Insert jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak ke DB
            // insert ke database mining_c45
            mysqli_query($con,"INSERT INTO mining_c45 VALUES ('', 'Total', 'Total', '$getJumlahKasusTotal', '$getJumlahKasusLayak', '$getJumlahKasusTidakLayak', '', '', '', '', '', '')");

        } else {
//#5# Jika atribut != total (atribut lainnya), maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak masing2 atribut
            // ambil nilai atribut
            $sqlNilaiAtribut = mysqli_query($con,"SELECT nilai_atribut FROM atribut WHERE atribut = '$getAtribut' ORDER BY id");
            while($rowNilaiAtribut = mysqli_fetch_assoc($sqlNilaiAtribut)) {
                $getNilaiAtribut = $rowNilaiAtribut['nilai_atribut'];

                // set kondisi dimana nilai_atribut = berdasakan masing2 atribut dan income data = data training
                $kondisi = "$getAtribut = '$getNilaiAtribut' AND income is not null $kondisiAtribut";

                // hitung jumlah kasus per atribut
                $sqlJumlahKasusTotalAtribut = mysqli_query($con,"SELECT COUNT(*) as jumlah_total FROM sample2 WHERE $kondisi");

                $rowJumlahKasusTotalAtribut = mysqli_fetch_assoc($sqlJumlahKasusTotalAtribut);
                $getJumlahKasusTotalAtribut = $rowJumlahKasusTotalAtribut['jumlah_total'];

                // hitung jumlah kasus layak
                $sqlJumlahKasusLayakAtribut = mysqli_query($con,"SELECT COUNT(*) as jumlah_layak FROM sample2 WHERE $kondisi AND income = '>50k'");
                $rowJumlahKasusLayakAtribut = mysqli_fetch_assoc($sqlJumlahKasusLayakAtribut);
                $getJumlahKasusLayakAtribut = $rowJumlahKasusLayakAtribut['jumlah_layak'];

                // hitung jumlah kasus TDK layak
                $sqlJumlahKasusTidakLayakAtribut = mysqli_query($con,"SELECT COUNT(*) as jumlah_tidak_layak FROM sample2 WHERE $kondisi AND income = '<=50k'");
                $rowJumlahKasusTidakLayakAtribut = mysqli_fetch_assoc($sqlJumlahKasusTidakLayakAtribut);
                $getJumlahKasusTidakLayakAtribut = $rowJumlahKasusTidakLayakAtribut['jumlah_tidak_layak'];

//#6# Insert jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak masing2 atribut ke DB
                // insert ke database mining_c45
                mysqli_query($con,"INSERT INTO mining_c45 VALUES ('', '$getAtribut', '$getNilaiAtribut', '$getJumlahKasusTotalAtribut', '$getJumlahKasusLayakAtribut', '$getJumlahKasusTidakLayakAtribut', '', '', '', '', '', '')");
                
//#7# Lakukan perhitungan entropy
                // perhitungan entropy
                $sqlEntropy = mysqli_query($con,"SELECT id, jml_kasus_total, jml_yes, jml_no FROM mining_c45");
                while($rowEntropy = mysqli_fetch_assoc($sqlEntropy)) {
                    $getJumlahKasusTotalEntropy = $rowEntropy['jml_kasus_total'];
                    $getJumlahKasusLayakEntropy = $rowEntropy['jml_yes'];
                    $getJumlahKasusTidakLayakEntropy = $rowEntropy['jml_no'];
                    $idEntropy = $rowEntropy['id'];

                    // jika jml kasus = 0 maka entropy = 0
                    if ($getJumlahKasusTotalEntropy == 0 OR $getJumlahKasusLayakEntropy == 0 OR $getJumlahKasusTidakLayakEntropy == 0) {
                        $getEntropy = 0;
                    // jika jml kasus layak = jml kasus tdk layak, maka entropy = 1
                    } else if ($getJumlahKasusLayakEntropy == $getJumlahKasusTidakLayakEntropy) {
                        $getEntropy = 1;
                    } else { // jika jml kasus != 0, maka hitung rumus entropy:
                        $perbandingan_layak = $getJumlahKasusLayakEntropy / $getJumlahKasusTotalEntropy;
                        $perbandingan_tidak_layak = $getJumlahKasusTidakLayakEntropy / $getJumlahKasusTotalEntropy;

                        $rumusEntropy = (-($perbandingan_layak) * log($perbandingan_layak,2)) + (-($perbandingan_tidak_layak) * log($perbandingan_tidak_layak,2));
                        $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                    }

//#8# Update nilai entropy
                    // update nilai entropy
                    mysqli_query($con,"UPDATE mining_c45 SET entropy = $getEntropy WHERE id = $idEntropy");
                }
                
//#9# Lakukan perhitungan information gain
                // perhitungan information gain
                // ambil nilai entropy dari total (jumlah kasus total)
                $sqlJumlahKasusTotalInfGain = mysqli_query($con,"SELECT jml_kasus_total, entropy FROM mining_c45 WHERE atribut = 'Total'");
                $rowJumlahKasusTotalInfGain = mysqli_fetch_assoc($sqlJumlahKasusTotalInfGain);
                $getJumlahKasusTotalInfGain = $rowJumlahKasusTotalInfGain['jml_kasus_total'];
                // rumus information gain
                $getInfGain = (-(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * ($getEntropy))); 
                   
//#10# Update information gain tiap nilai atribut (temporary)
                // update inf_gain_temp (utk mencari nilai masing2 atribut)
                mysqli_query($con,"UPDATE mining_c45 SET inf_gain_temp = $getInfGain WHERE id = $idEntropy");
                $getEntropy = $rowJumlahKasusTotalInfGain['entropy'];

                // jumlahkan masing2 inf_gain_temp atribut 
                $sqlAtributInfGain = mysqli_query($con,"SELECT SUM(inf_gain_temp) as inf_gain FROM mining_c45 WHERE atribut = '$getAtribut'");
                while ($rowAtributInfGain = mysqli_fetch_assoc($sqlAtributInfGain)) {
                    $getAtributInfGain = $rowAtributInfGain['inf_gain'];

                    // hitung inf gain
                    $getInfGainFix = round(($getEntropy + $getAtributInfGain),4);

//#11# Looping perhitungan information gain, sehingga mendapatkan information gain tiap atribut. Update information gain
                    // update inf_gain (fix)
                    mysqli_query($con,"UPDATE mining_c45 SET inf_gain = $getInfGainFix WHERE atribut = '$getAtribut'");
                } 
                
//#12# Lakukan perhitungan split info
                // rumus split info
                $getSplitInfo = (($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * (log(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain),2)));
               
//#13# Update split info tiap nilai atribut (temporary)
                // update split_info_temp (utk mencari nilai masing2 atribut)
                mysqli_query($con,"UPDATE mining_c45 SET split_info_temp = $getSplitInfo WHERE id = $idEntropy");
                
                // jumlahkan masing2 split_info_temp dari tiap atribut 
                $sqlAtributSplitInfo = mysqli_query($con,"SELECT SUM(split_info_temp) as split_info FROM mining_c45 WHERE atribut = '$getAtribut'");
                while ($rowAtributSplitInfo = mysqli_fetch_assoc($sqlAtributSplitInfo)){
                    $getAtributSplitInfo = $rowAtributSplitInfo['split_info'];

                    // split info fix (4 angka di belakang koma)
                    $getSplitInfoFix = -(round($getAtributSplitInfo,4));

//#14# Looping perhitungan split info, sehingga mendapatkan information gain tiap atribut. Update information gain
                    // update split info (fix)
                    mysqli_query($con,"UPDATE mining_c45 SET split_info = $getSplitInfoFix WHERE atribut = '$getAtribut'");
                }
            }
            
//#15# Lakukan perhitungan gain ratio
            $sqlGainRatio = mysqli_query($con,"SELECT id, inf_gain, split_info FROM mining_c45");
            while($rowGainRatio = mysqli_fetch_assoc($sqlGainRatio)) {
                $idGainRatio = $rowGainRatio['id'];
                // jika nilai inf gain == 0 dan split info == 0, maka gain ratio = 0
                if ($rowGainRatio['inf_gain'] == 0 AND $rowGainRatio['split_info'] == 0){
                    $getGainRatio = 0;
                } else {
                    // rumus gain ratio
                    if($rowGainRatio['inf_gain'] == 0 || $rowGainRatio['split_info']==0){
                        $getGainRatio = 0;
                    }else{
                         $getGainRatio = round(($rowGainRatio['inf_gain'] / $rowGainRatio['split_info']),4);
                    }
                   
                }
                
//#16# Update gain ratio dari setiap atribut
                mysqli_query($con,"UPDATE mining_c45 SET gain_ratio = $getGainRatio WHERE id = '$idGainRatio'");
            }
        }
    }
}

//#17# Insert atribut dgn information gain max ke DB pohon keputusan
function insertAtributPohonKeputusan($atribut, $nilai_atribut)
{
    $perhitunganPessimisticChildIncrement = 0;
$keputusanPrePruning = null;
       $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
    // ambil nilai inf gain tertinggi dimana hanya 1 atribut saja yg dipilih
    $sqlInfGainMaxTemp = mysqli_query($con,"SELECT distinct atribut, gain_ratio FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    $rowInfGainMaxTemp = mysqli_fetch_assoc($sqlInfGainMaxTemp);
    // hanya ambil atribut dimana jumlah kasus totalnya tidak kosong
    if ($rowInfGainMaxTemp['gain_ratio'] > 0) {
        // ambil nilai atribut yang memiliki nilai inf gain max
        $sqlInfGainMax = mysqli_query($con,"SELECT * FROM mining_c45 WHERE atribut = '$rowInfGainMaxTemp[atribut]'");
        while($rowInfGainMax = mysqli_fetch_assoc($sqlInfGainMax)) {
            if ($rowInfGainMax['jml_yes'] == 0 AND $rowInfGainMax['jml_no'] == 0) {
                $keputusan = 'Kosong'; // jika jml_yes = 0 dan jml_no = 0, maka keputusan Null
            } else if ($rowInfGainMax['jml_yes'] !== 0 AND $rowInfGainMax['jml_no'] == 0) {
                $keputusan = '>50k'; // jika jml_yes != 0 dan jml_no = 0, maka keputusan Layak
            } else if ($rowInfGainMax['jml_yes'] == 0 AND $rowInfGainMax['jml_no'] !== 0) {
                $keputusan = '<=50k'; // jika jml_yes = 0 dan jml_no != 0, maka keputusan Tidak Layak
            } else {
                $keputusan = '?'; // jika jml_yes != 0 dan jml_no != 0, maka keputusan ?
            }
            
            if (empty($atribut) AND empty($nilai_atribut)) {
//#18# Jika atribut yang diinput kosong (atribut awal) maka insert ke pohon keputusan id_parent = 0
                // set kondisi atribut = AND atribut = nilai atribut
                $kondisiAtribut = "AND $rowInfGainMax[atribut] = ~$rowInfGainMax[nilai_atribut]~";
                // insert ke tabel pohon keputusan
                mysqli_query($con,"INSERT INTO pohon_keputusan_c45 VALUES ('', '$rowInfGainMax[atribut]', '$rowInfGainMax[nilai_atribut]', 0, '$rowInfGainMax[jml_yes]', '$rowInfGainMax[jml_no]', '$keputusan', 'Belum', '$kondisiAtribut', 'Belum')");
            }

//#19# Jika atribut yang diinput tidak kosong maka insert ke pohon keputusan dimana id_parent diambil dari tabel pohon keputusan sebelumnya (where atribut = atribut yang diinput)
            else if (!empty($atribut) AND !empty($nilai_atribut)) {
                $sqlIdParent = mysqli_query($con,"SELECT id, atribut, nilai_atribut, jml_yes, jml_no FROM pohon_keputusan_c45 WHERE atribut = '$atribut' AND nilai_atribut = '$nilai_atribut' order by id DESC LIMIT 1");
                while($rowIdParent = mysqli_fetch_assoc($sqlIdParent)) {
                    // insert ke tabel pohon keputusan
                   $tess=  mysqli_query($con,"INSERT INTO pohon_keputusan_c45 VALUES ('', '$rowInfGainMax[atribut]', '$rowInfGainMax[nilai_atribut]', $rowIdParent[id], '$rowInfGainMax[jml_yes]', '$rowInfGainMax[jml_no]', '$keputusan', 'Belum', '', 'Belum')");
                    
                    //#PRE PRUNING (dokumentasi -> http://id3-c45.xp3.biz/dokumentasi/Decision-Tree.10.11.ppt)#
                    // hitung Pessimistic error rate parent dan child 
                    $perhitunganParentPrePruning = loopingPerhitunganPrePruning($rowIdParent['jml_yes'], $rowIdParent['jml_no']);

                    $perhitunganChildPrePruning = loopingPerhitunganPrePruning($rowInfGainMax['jml_yes'], $rowInfGainMax['jml_no']);
                    
                    // hitung average Pessimistic error rate child 
                    $perhitunganPessimisticChild = (($rowInfGainMax['jml_yes'] + $rowInfGainMax['jml_no']) / ($rowIdParent['jml_yes'] + $rowIdParent['jml_no'])) * $perhitunganChildPrePruning;
                    // Increment average Pessimistic error rate child

                    $perhitunganPessimisticChildIncrement += $perhitunganPessimisticChild;
                    $perhitunganPessimisticChildIncrement = round($perhitunganPessimisticChildIncrement, 4);
                    
                    // jika error rate pada child lebih besar dari error rate parent
                    if ($perhitunganPessimisticChildIncrement > $perhitunganParentPrePruning) {
                        // hapus child (child tidak diinginkan)
                        mysqli_query($con,"DELETE FROM pohon_keputusan_c45 WHERE id_parent = $rowIdParent[id]");
                        
                        // jika jml kasus layak lbh besar, maka keputusan == layak
                        if ($rowIdParent['jml_yes'] > $rowIdParent['jml_no']) {
                            $keputusanPrePruning = '>50k';
                        // jika jml tdk kasus layak lbh besar, maka keputusan == tdk layak
                        } else if ($rowIdParent['jml_yes'] < $rowIdParent['jml_no']) {
                            $keputusanPrePruning = '<=50k';
                        }
                        // update keputusan parent
                        mysqli_query($con,"UPDATE pohon_keputusan_c45 SET keputusan = '$keputusanPrePruning' where id = $rowIdParent[id]");
                    }
                }
            }
        }
    }
    loopingKondisiAtribut();
}

//#20# Lakukan looping kondisi atribut untuk diproses pada fungsi perhitunganC45()
function loopingKondisiAtribut() 
{
       $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
    // ambil semua id dan kondisi atribut
    $sqlLoopingKondisi = mysqli_query($con,"SELECT id, kondisi_atribut FROM pohon_keputusan_c45");
    while($rowLoopingKondisi = mysqli_fetch_assoc($sqlLoopingKondisi)) {
        // select semua data dimana id_parent = id awal
        $sqlUpdateKondisi = mysqli_query($con,"SELECT * FROM pohon_keputusan_c45 WHERE id_parent = $rowLoopingKondisi[id] AND looping_kondisi = 'Belum'");
        while($rowUpdateKondisi = mysqli_fetch_assoc($sqlUpdateKondisi)) {
            // set kondisi: kondisi sebelumnya yg diselect berdasarkan id_parent ditambah 'AND atribut = nilai atribut'
            $kondisiAtribut = "$rowLoopingKondisi[kondisi_atribut] AND $rowUpdateKondisi[atribut] = ~$rowUpdateKondisi[nilai_atribut]~";
            // update kondisi atribut
            mysqli_query($con,"UPDATE pohon_keputusan_c45 SET kondisi_atribut = '$kondisiAtribut', looping_kondisi = 'Sudah' WHERE id = $rowUpdateKondisi[id]");
        }
    }
    insertIterasi();
}

//#21# Insert iterasi nilai perhitungan ke DB
function insertIterasi()
{
       $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
    $sqlInfGainMaxIterasi = mysqli_query($con,"SELECT distinct atribut, gain_ratio FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    $rowInfGainMaxIterasi = mysqli_fetch_assoc($sqlInfGainMaxIterasi);
    // hanya ambil atribut dimana jumlah kasus totalnya tidak kosong
    if ($rowInfGainMaxIterasi['gain_ratio'] > 0) {
        $kondisiAtribut = "$rowInfGainMaxIterasi[atribut]";
        $iterasiKe = 1;
        $sqlInsertIterasiC45 = mysqli_query($con,"SELECT * FROM mining_c45");
        while($rowInsertIterasiC45 = mysqli_fetch_assoc($sqlInsertIterasiC45)) {
            // insert ke tabel iterasi
            mysqli_query($con,"INSERT INTO iterasi_c45 VALUES ('', $iterasiKe, '$kondisiAtribut', '$rowInsertIterasiC45[atribut]', '$rowInsertIterasiC45[nilai_atribut]', '$rowInsertIterasiC45[jml_kasus_total]', '$rowInsertIterasiC45[jml_yes]', '$rowInsertIterasiC45[jml_no]', '$rowInsertIterasiC45[entropy]', '$rowInsertIterasiC45[inf_gain]', '$rowInsertIterasiC45[split_info]', '$rowInsertIterasiC45[gain_ratio]')");
            $iterasiKe++;
        }
    }
}

//#22# Ambil information gain max untuk diproses pada fungsi loopingMiningC45()
function getInfGainMax($atribut, $nilai_atribut)
{
      $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
    // select inf gain max
    $sqlInfGainMaxAtribut = mysqli_query($con,"SELECT distinct atribut FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    while($rowInfGainMaxAtribut = mysqli_fetch_assoc($sqlInfGainMaxAtribut)) {
        $inf_gain_max_atribut = "$rowInfGainMaxAtribut[atribut]";
        if (empty($atribut) AND empty($nilai_atribut)) {
            // jika atribut kosong, proses atribut dgn inf gain max pada fungsi loopingMiningC45()
            loopingMiningC45($inf_gain_max_atribut);
        } else if (!empty($atribut) AND !empty($nilai_atribut)) {
            // jika atribut tdk kosong, maka update diproses = sudah pada tabel pohon_keputusan_c45
            mysqli_query($con,"UPDATE pohon_keputusan_c45 SET diproses = 'Sudah' WHERE nilai_atribut = '$nilai_atribut'");
            // proses atribut dgn inf gain max pada fungsi loopingMiningC45()
            loopingMiningC45($inf_gain_max_atribut);
        }
    }
}

//#23# Looping proses mining dimana atribut dgn information gain max yang akan diproses pada fungsi miningC45()
function loopingMiningC45($inf_gain_max_atribut) 
{
      $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
    $sqlBelumAdaKeputusanLagi = mysqli_query($con,"SELECT * FROM pohon_keputusan_c45 WHERE keputusan = '?' and diproses = 'Belum' AND atribut = '$inf_gain_max_atribut'");
    while($rowBelumAdaKeputusanLagi = mysqli_fetch_assoc($sqlBelumAdaKeputusanLagi)) {
        if ($rowBelumAdaKeputusanLagi['id_parent'] == 0) {
             populateAtribut();
        }
        $atribut = "$rowBelumAdaKeputusanLagi[atribut]";
        $nilai_atribut = "$rowBelumAdaKeputusanLagi[nilai_atribut]";
        $kondisiAtribut = "AND $atribut = \'$nilai_atribut\'";
        mysqli_query($con,"TRUNCATE mining_c45");
        mysqli_query($con,"DELETE FROM atribut WHERE atribut = '$inf_gain_max_atribut'");
        miningC45($atribut, $nilai_atribut);
         populateAtribut();
    }
}

// rumus menghitung Pessimistic error rate
function perhitunganPrePruning($r, $z, $n)
{
    if ($r == 0 || $z == 0 || $n == 0){
        $rumus=0;
    }else{
    $rumus = ($r + (($z * $z) / (2 * $n)) + ($z * (sqrt(($r / $n) - (($r * $r) / $n) + (($z * $z) / (4 * ($n * $n))))))) / (1 + (($z * $z) / $n));
    $rumus = round($rumus, 4);
}
    
    return $rumus;
}

// looping perhitungan Pessimistic error rate
function loopingPerhitunganPrePruning($positif, $negatif)
{
    $z = 1.645; // z = batas kepercayaan (confidence treshold)
    $n = $positif + $negatif; // n = total jml kasus
    $n = round($n, 4);
    // r = perbandingan child thd parent
    if ($positif < $negatif) {
        $r = $positif / ($n);
        $r = round($r, 4);
        return perhitunganPrePruning($r, $z, $n);
    } elseif ($positif > $negatif) {
        $r = $negatif / ($n);   
        $r = round($r, 4);
        return perhitunganPrePruning($r, $z, $n);
    } elseif ($positif == $negatif) {
        if($positif == 0 || $negatif == 0){
            $r = 0;
        }else{
             $r = $negatif / ($n);
        $r = round($r, 4);
        }
       
        return perhitunganPrePruning($r, $z, $n);
    }
}

// replace keputusan jika ada keputusan yg Null
function replaceNull()
{
      $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
    $sqlReplaceNull = mysqli_query($con,"SELECT id, id_parent FROM pohon_keputusan_c45 WHERE keputusan = 'Kosong' OR keputusan = '' OR keputusan = '?' ");
    while($rowReplaceNull = mysqli_fetch_assoc($sqlReplaceNull)) {
        $sqlReplaceNullIdParent = mysqli_query($con,"SELECT jml_yes, jml_no, keputusan FROM pohon_keputusan_c45 WHERE id = $rowReplaceNull[id_parent]");
        $rowReplaceNullIdParent = mysqli_fetch_assoc($sqlReplaceNullIdParent);
        if ($rowReplaceNullIdParent['jml_yes'] > $rowReplaceNullIdParent['jml_no']) {
            $keputusanNull = '>50k'; // jika jml_yes != 0 dan jml_no = 0, maka keputusan Layak
        } else if ($rowReplaceNullIdParent['jml_yes'] < $rowReplaceNullIdParent['jml_no']) {
            $keputusanNull = '<=50k'; // jika jml_yes = 0 dan jml_no != 0, maka keputusan Tidak Layak
        }
        mysqli_query($con,"UPDATE pohon_keputusan_c45 SET keputusan = '$keputusanNull' WHERE id = $rowReplaceNull[id]");
    }
}

                echo "<script>window.location.href='../tree.php'</script>";
    

          