<?php
    include('DB.php');
    class Login{
      Public Static function isLoggedIn() {
        if (isset($_COOKIE['SNID'])) {
          if (DB::query('SELECT u_id FROM login WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))) {
            $u_id = DB::query('SELECT u_id FROM login WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['u_id'];
            //return $user_id;
            if (isset($_COOKIE['SNID_'])) {
              return $u_id;
            }else {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              DB::query('INSERT INTO login VALUES(\'\',:token, :u_id)', array(':token'=>sha1($token),':u_id'=>$uid));
              DB::query('DELETE FROM login WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])));

              setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
              return $uid;
            }
          }
        }
        return false;
      }
    }
 ?>
