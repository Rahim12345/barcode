<?php  
session_start();
date_default_timezone_set("Asia/Baku");
include '../include/config.php'; 
if(isset($_SESSION["id"]))
{
	$query4Admin=$conn->prepare("SELECT * FROM users WHERE id=? AND status=?");
	$query4Admin->execute([$_SESSION["id"],"admin"]);
	$rows4Admin=$query4Admin->fetchall(PDO::FETCH_ASSOC);
	$count4Admin=count($rows4Admin);
	if($count4Admin==1)
	{
		include 'header.php';
		if(isset($_GET["id"]))
		{
			$id=htmlspecialchars(trim($_GET["id"]));
			if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
			{
				if($id==1)
				{
					// Anbar əlavə etdim
					include 'content_warehouse1.php';
				}
				elseif($id==2) 
				{
					// Mövcud anbarlar
					include 'content_existWarehouse.php';
				}
				elseif($id==3)
				{
					// Mağaza əlavə etdim
					include 'content_store1.php';
				}
				elseif($id==4)
				{
					// Mövcud mağazalar
					include 'content_existStore.php';
				}
				elseif($id==5)
				{
					// Vəzifə əlavə etdim
					include 'content_job.php';
				}
				elseif($id==6)
				{
					// Mövcud vəzifələr
					include 'content_existJob.php';
				}
				elseif($id==7)
				{
					// İşçi əlavə etdim
					include 'content_worker.php';
				}
				elseif($id==8)
				{
					// Mövcud işçilər
					include 'content_existWorker.php';
				}
				elseif($id==9)
				{
					// Admin profil
					include 'content_profil.php';
				}
				elseif($id==10)
				{
					// İstehsalçı əlavə etdim
					include 'content_manufacturer.php';
				}
				elseif($id==11)
				{
					// Mövcud istehsalçılar
					include 'content_exist_manufacturer.php';
				}
				elseif($id==12)
				{
					// Model əlavə etdim
					include 'content_model.php';
				}
				elseif($id==13)
				{
					// Mövcud modellər
					include 'content_existModel.php';
				}
				elseif($id==14)
				{
					// Məhsul əlavə etdim
					include 'content_product.php';
				}
				elseif($id==15)
				{
					// Kateqoriya əlavə etdim
					include 'content_category.php';
				}
				elseif($id==16)
				{
					// Mövcud kateqoriyalar
					include 'content_existCategory.php';
				}
				elseif($id==17)
				{
					// Mövcud məhsullar
					// include 'content_existProduct.php';
					include 'prod.php';
				}
				elseif($id==18)
				{
					// Partnor əlavə etdim
					include 'content_partnor.php';
				}
				elseif($id==19)
				{
					// Mövcud partnorlar
					include 'content_existPartnor.php';
				}
				elseif($id==20)
				{
					// Məhsulları payladım
					include 'content_share.php';
				}
				elseif($id==21)
				{
					// Şifrəni dəyişdim
					include 'content_password.php';
				}
				elseif($id==22)
				{
					// Dəbbəni daxil etdim
					include 'content_debbe.php';
				}
				elseif($id==23)
				{
					// İlkin kredit günün təyini üçün limit qoydum
					include 'content_limitedCredit.php';
				}
				elseif($id==24)
				{
					// Satılan mallar səhifəsin düzəldim
					include '404.html';
				}
				elseif($id==25)
				{
					// Müştərinin kredit cədvəli ətraflı
					include 'credit_table.php';
				}
				elseif($id==26)
				{
					// Göndərilməmiş məhsullar səhifəsin düzəltdim
					include '404.html';
				}
				elseif($id==27)
				{
					// Məhsulu göndəriləsi müştərinin kredit cədvəli ətraflı
					include 'orderTable.php';
				}
				elseif($id==28)
				{
					// Qayimə sistemi
					include 'qayime.php';
				}
				elseif($id==29)
				{
					// Qaynarxətt sistemi
					include 'qaynarXett.php';
				}
				elseif($id==30)
				{
					// Göndərilən məhsulu update elədim
					include 'updateGonder.php';
				}
				elseif($id==31)
				{
					// Mağazanı aç-bağla sistemi
					include 'door.php';
				}
				elseif($id==32)
				{
					// Serialı paylaşım
					include 'seriaShare.php';
				}
				elseif($id==33)
				{
					// Serialı paylaşım
					include 'seriaShareid.php';
				}
				elseif($id==34)
				{
					// Serialı paylaşım
					include 'shareSeria.php';
				}
				elseif($id==35)
				{
					// Vahid daxil et
					include 'unit.php';
				}
				elseif($id==36)
				{
					// Vahid daxil et
					include 'existunits.php';
				}
				elseif($id==37)
				{
					// Satış arxivi
					// include 'productMap.php';
					include '404.html';
				}
				elseif($id==38)
				{
					// Statistika
					include 'content.php';
					include 'charts.php';
				}
				elseif($id==39)
				{
					// kreditləşmənin xəbərləri
					include 'creditShow.php';
				}
				elseif($id==40)
				{
					// kreditləşmənin xəbərləri
					include 'creditPayShow.php';
				}
				elseif($id==41)
				{
					// Nağd xəbərləri
					include 'nagdShow.php';
				}
				elseif($id==42)
				{
					// Nağd xəbərləri
					include 'nagdShow1.php';
				}
				elseif($id==43)
				{
					// Topdan xəbərləri
					include 'topdanShow.php';
				}
				elseif($id==44)
				{
					// Topdan xəbərləri
					include 'topdanShow1.php';
				}
				elseif($id==45)
				{
					// Topdan iade
					// include 'topdanIadeShow.php';
					include '404.html';
				}
				elseif($id==46)
				{
					// Hesabat
					include 'accountPartnor.php';
				}
				elseif($id==47)
				{
					// past time
					include 'pastDate.php';
				}
				elseif($id==48)
				{
					// past time
					include 'noLimitDate.php';
				}
				elseif($id==49)
				{
					// işçi bloklama
					include 'holiday.php';
				}
				elseif($id==50)
				{
					// kredit hesabatı
					include 'creditHesabat.php';
				}
				elseif($id==51)
				{
					// kredit hesabatı
					include 'creditHesabatlist.php';
				}
				elseif($id==52)
				{
					// əmək haqqı hesabatı
					include 'salaryCount.php';
				}
				elseif($id==53)
				{
					// əmək haqqı hesabatı
					include 'salaryList.php';
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
		else
		{
			include 'news.php';
		}
		include 'footer.php';
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