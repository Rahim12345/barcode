<?php
date_default_timezone_set("Asia/Baku");
session_start();
include '../include/config.php';
if(isset($_SESSION["id"]))
{
	$query4Seller=$conn->prepare("SELECT * FROM users WHERE id=? AND status!=?");
	$query4Seller->execute([$_SESSION["id"],"admin"]);
	$rows4Seller=$query4Seller->fetchall(PDO::FETCH_ASSOC);
	$count4Seller=count($rows4Seller);
	if($count4Seller==1)
	{
		$doorKey=$rows4Seller[0]["doorKey"];
		if($doorKey==0)
		{
			include 'header.php';
			if(isset($_GET["id"]))
			{
				if(isset($_POST["searchbtn"]) && !empty($searchsmth))
				{
					include 'searchResult.php';
				}
				else
				{
					$id=htmlspecialchars(trim($_GET["id"]));
					if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
					{
						if($id==1)
						{
							// Məhsul sistemi
							include 'products.php';
						}
						elseif($id==2)
						{
							// Satıcıya şifrəsin dəyişməyə icazə verdim
							include 'content_profil.php';
						}
						elseif($id==3)
						{
							// Alıcı ilə kredit müqaviləsinin bağlanmasını düzəldim
							include 'sil.php';
						}
						elseif($id==4)
						{
							// Müqaviləyə baxış
							include 'credit_table.php';
						}
						elseif($id==5)
						{
							// Satıcının satdığı məhsullar səhifəsini hazırladım
							include 'mySelledProducts.php';
						}
						elseif($id==6)
						{
							// Göndəriləsi məhsullar səhifəsini hazırladım
							include 'orderedProducts.php';
						}
						elseif($id==7)
						{
							// Məhsulu göndəriləsi müştərinin kredit cədvəli ətraflı
							include 'orderTable.php';
						}
						elseif($id==8)
						{
							// Bugünki krediti olanlar
							include 'currentDebitor.php';
						}
						elseif($id==9)
						{
							// Burada debitor axtarışı üzrə müqavilənin baxılmasını düzəltdim
							include 'debitCreditTable.php';
						}
						elseif($id==10)
						{
							// Burada bugün krediti olan debitorların  müqaviləsinə baxılmasını düzəltdim
							include 'debitorTodayCreditTable.php';
						}
						elseif($id==11)
						{
							// Burada kredit ödənilməsi səhifəsin düzəltdim
							include 'debitorTodayCreditTable.php';
						}
						elseif($id==12)
						{
							// Burada kredit ödənilməsi səhifəsin düzəltdim
							// Həmçinin dəbbənin neçə gün gecikdiyin müəyyən etdim
							include 'pay.php';
						}
						elseif($id==13)
						{
							// Burada kreditbazaya daxil etdim
							include 'payInsert.php';
						}
						elseif($id==14)
						{
							// Burada gecikmiş kredit səhifəsin düzəltdim
							include 'overdueCredit.php';
						}
						elseif($id==15)
						{
							// Qayimə sistemin düzəltdim
							// include 'qayime.php';
							include '404.html';
						}
						elseif($id==16)
						{
							// Dəbbə günləri yenilənmədən ekrana gəldiyi üçün bu səhifədən keçirdim ki yeniləməyə ehtiyac olmasın
							include 'test.php';
						}
						elseif($id==17)
						{
							// Daimi müştərilər üçün kreditləşmə
							include 'daimi.php';
						}
						elseif($id==18)
						{
							// Daimi müştərilər üçün kreditləşmə iki dənə POST iç-içə idi və bir birindən asılı deyildi
							include 'daimiRedirect.php';
						}
						elseif($id==19)
						{
							// Gecikmiş debitor haqqında məlumatlar
							include 'overdueCreditTable.php';
						}
						elseif($id==20)
						{
							// Qəbz səhifəsi
							include 'qebz.php';
						}
						elseif($id==21)
						{
							// Mövcud qəbzlər
							include 'qebzExist.php';
						}
						elseif($id==22)
						{
							// Qəbzin yenilənərkən təkrar yazılmasının qarşısın aldım
							include 'qebzilk.php';
						}
						elseif($id==23)
						{
							// Göndərilən malları yenilədim
							include 'updateGonder.php';
						}
						elseif($id==24)
						{
							// Nağd satış
							include 'express.php';
						}
						elseif($id==25)
						{
							// Nağd satış bugünə söz verənlər
							include 'promise.php';
						}
						elseif($id==26)
						{
							// Nağd satış bugünə söz verənlər
							include 'promisePay.php';
						}
						elseif($id==27)
						{
							// Nağd satış bugünə söz verənlər ödənişini yazdırdım
							include 'promisePayInsert.php';
						}
						elseif($id==28)
						{
							// Topdan satış bugünə söz verənlər
							include 'promiseT.php';
						}
						elseif($id==29)
						{
							// Kreditləşdikdən sonra yenilənəndə məlumatların təzədən yazılmaması üçün bu səhifəyə yönəltdim
							include 'creditRefresh.php';
						}
						elseif($id==30)
						{
							// Topdan satış
							include 'topdan.php';
						}
						elseif($id==31)
						{
							// Topdan satış bugünə söz verənlər
							include 'promiseTPay.php';
						}
						elseif($id==32)
						{
							// Topdan satış bugünə söz verənlər ödənişini yazdırdım
							include 'promiseTPayInsert.php';
						}
						elseif($id==33)
						{
							// Kassaya pul daxil et
							include 'kassaEntry.php';
						}
						elseif($id==34)
						{
							// Kassadan pul  götür
							include 'kassaExit.php';
						}
						elseif($id==35)
						{
							// iane et
							include 'iane.php';
						}
						elseif($id==36)
						{
							// iane et
							include 'ianeCredit.php';
						}
						elseif($id==37)
						{
							// iane et
							include 'ianeNagd.php';
						}
						elseif($id==38)
						{
							// iane et
							include 'ianeTopdan.php';
						}
						elseif($id==39)
						{
							// Partnyorlarin borcun ver
							include 'PartnorMoney.php';
						}
						elseif($id==40)
						{
							include 'emekHaqqi.php';
						}
						elseif($id==41)
						{
							include 'credBmk.php';
						}
						else
						{
							include '404.html';
						}
					}
					else
					{
						include '404.html';
					}
				}
			}
			else
			{
				if(isset($_POST["searchbtn"]))
				{
					if(!empty($searchsmth))
					{
						include 'searchResult.php';
					}
					else
					{
						include 'content.php';
					}
				}
				else
				{
					include 'content.php';
				}
			}
			include 'footer.php';
		}
		else
		{
ob_start();
header("location:exit.php");
		}
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0;url=../">';
	}
}
else
{
	echo '<meta http-equiv="refresh" content="0;url=../">';
}
?>