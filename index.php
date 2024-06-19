<?php
  require('vendor/autoload.php'); // panggil model dari user
  
  use chillerlan\QRCode\QRCode; // panggil model dari user
  session_start();
  $con = new mysqli("localhost","root","","qrcafe");
  if(isset($_GET['logout'])){
    session_unset();
    header("Location:index.php"); 
  }
  else if(isset($_GET['qr_code'])||isset($_GET['add_transaksi'])){
    require('conttroler/user/qr_code.php');
  }
  else if(isset($_SESSION['username'])){
	
	if($_SESSION['role']=="admin"){
		
		if((isset($_SESSION['username']) && isset($_GET['jenis'])) || isset($_GET['add_jenis']) || isset($_GET['edit_jenis']) || isset($_GET['delete_jenis'])){
			require('conttroler/user/jenis.php');
		}
		else if((isset($_SESSION['username']) && isset($_GET['transaksi'])&& isset($_GET['transaksisss'])) ){
			require('conttroler/user/transaksi.php');
		}
		else if((isset($_SESSION['username']) && isset($_GET['nota'])) || isset($_GET['add_nota']) || isset($_GET['edit_nota']) || isset($_GET['delete_nota'])){
			require('conttroler/user/nota.php');
		}
		else if((isset($_SESSION['username']) && isset($_GET['menu'])) || isset($_GET['add_menu']) || isset($_GET['edit_menu']) || isset($_GET['delete_menu'])){
			require('conttroler/user/menu.php');
		}else{
			require('conttroler/user/transaksi.php');
		}
	}
	
	
	
	}
		
    else if(isset($_GET['register'])){
      require('conttroler/auth/register.php');
    }
    else if(isset($_GET['lupa_password'])){
		require('conttroler/auth/lupa_password.php');
    }
    else if(isset($_GET['login'])){
		require('conttroler/auth/login.php');
    }
  else{
	require('conttroler/auth/login.php');
  }