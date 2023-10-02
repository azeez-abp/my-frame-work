
function decode(encrytedStr_array,key,scatterer){
	key  = btoa(key);
	let key_ascii_total_val  = 0;
	for (let index = 0; index < key.length; index++) {
		key_ascii_total_val += key.charCodeAt(index)//calculate the secrete key
	}

	if(encrytedStr_array[1] !== key_ascii_total_val){
		return false  // if the secreate key does not match
	}

	try {
			//reorganize the scattered array
			let scattared_array  = atob(encrytedStr_array[2]) 
			scattared_array  = JSON.parse( scattared_array)
			let re_oranize_arr  = []
			let ind = 0;
		   // let 	keys  = Object.keys(scatterer);
			let  value  = Object.values(scatterer)
	   
		   while(scatterer.length>ind){
			   re_oranize_arr[value[ind]] = scattared_array[ind]
			  ind++;
		   }
	   
	   
	   
		  let $int_array_encryted  = JSON.parse(atob(re_oranize_arr.join("")))
	   
			  let $decrypted  = '';
		   for (let index_ = 0; index_ < $int_array_encryted .length; index_++) {
			   $decrypted +=   String.fromCharCode($int_array_encryted [index_]-key_ascii_total_val) 
		   }
		   
		   return JSON.parse(atob ($decrypted))[0];
	} catch (error) {
		 console.log("ERR DECODING THE CIPHER. MAKE SURE YOU HAVE YOUR SECRTE KEY AND SCATTERER ARRAY")
	}

}

let $p  = decode(["WzExMTksMTE1MywxMTA2LDExNTEsMTEyOSwxMTA0LDEwOTgsMTEwMSwxMTMwLDEwODMsMTEzMiwxMTQ5LDExMzAsMTEwMywxMDg5LDExMzYsMTEyMiwxMTA0LDExMTAsMTEwMSwxMTMwLDEwODIsMTExMCwxMDgxLDExMzAsMTExOSwxMTE4LDExNDksMTEzMiwxMTAzLDExMDIsMTA4MCwxMTI5LDExMTksMTA4OSwxMTQ5LDExMTQsMTA4MiwxMTE3LDExMzUsMTEzMiwxMDk5LDExMDYsMTEzMl0=",
    1032,'WyJERXhNekFzTVRFd015d3hNRGc1TERFeE16WXMiLCJNVEV5TWl3eE1UQTBMREV4TVRBc01URXdNU3ciLCJ3eE1UTXdMREV3T0RNc01URXpNaXd4TVRRNUwiLCJFek1pd3hNRGs1TERFeE1EWXNNVEV6TWwwPSIsIkV4TXpBc01URXhPU3d4TVRFNExERXhORGtzTSIsInNNVEV5T1N3eE1UQTBMREV3T1Rnc01URXdNUyIsIk1USTVMREV4TVRrc01UQTRPU3d4TVRRNUxERSIsIlRFek1pd3hNVEF6TERFeE1ESXNNVEE0TUN3eCIsInhNVFFzTVRBNE1pd3hNVEUzTERFeE16VXNNVCIsIld6RXhNVGtzTVRFMU15d3hNVEEyTERFeE5URSIsInhNVE13TERFd09ESXNNVEV4TUN3eE1EZ3hMRCJd'],
	'Xsd%$sW',
	[3, 4, 2, 10, 6, 1, 8, 7, 9, 0, 5]
	
	)
	
	
function encoder( $input=['soamthin to encode must be string'],  $key, $desembleCode = [])
{

   let $key_int_array  = [];
   let  $key_ascii_value_total  = 0;
     $key   = btoa($key);
    for (let $i = 0; $i < $key.length; $i++) {
       let $ascii_value = $key.charCodeAt([$i]);
        $key_ascii_value_total +=  $ascii_value;
		$key_int_array.push($ascii_value)
        //array_push($key_int_array, $ascii_value);
    }

      $input  = btoa(JSON.stringify($input));
      let $input_int_array  = [];
    for (let $x = 0; $x < $input.length; $x++) {
       let  $ascii_value = $input.charCodeAt([$x]) + $key_ascii_value_total;
	   $input_int_array.push($ascii_value)
       
    }
 
	  

  let   $output  = btoa(JSON.stringify($input_int_array));


   let  $scattered_chunk_arr = [];
    if ($desembleCode.length>0) {
        let $len  = $desembleCode.length;
        let $cutLen  = Math.ceil($output.length / $len);
        let $cut_start = 0;
        let $cut_end  = $output.length
        let $chunk_arr  = [];
        while ($cut_start < $cut_end) {
           let  $chunk  = $output.substr( $cut_start, $cutLen);
		   $chunk_arr.push($chunk)
           
            $cut_start += $cutLen;
        }
		console.log($chunk_arr)
       let  $scattered_chunk_arr  = [];
        while ($desembleCode.length>0) {
           let  $key  = $desembleCode.shift()// array_shift($desembleCode);

			$scattered_chunk_arr.push($chunk_arr[$key])//.push($chunk_arr[$key])
        }

		//console.log($scattered_chunk_arr)
        return ['encode done', $key_ascii_value_total, btoa(JSON.stringify($scattered_chunk_arr))];
        //  $output  =  base64_encode(json_encode($scattered_chunk_arr));
    }
  
   
}

let $encode = encoder(["phpDownloadsDocumentationGe t"], 'Xsd%$sW', [3, 4, 2, 10, 6, 1, 8, 7, 9, 0, 5]);
console.log($encode)

let dc   = decode(
	[
		'encode done',
		1032,
		'WyJERXhNekFzTVRFd015d3hNRGc1TERFeE16WXMiLCJNVEV5TWl3eE1UQTBMREV4TVRBc01URXdNU3ciLCJ3eE1UTXdMREV3T0RNc01URXpNaXd4TVRRNUwiLCJFek1pd3hNRGs1TERFeE1EWXNNVEV6TWwwPSIsIkV4TXpBc01URXhPU3d4TVRFNExERXhORGtzTSIsInNNVEV5T1N3eE1UQTBMREV3T1Rnc01URXdNUyIsIk1USTVMREV4TVRrc01UQTRPU3d4TVRRNUxERSIsIlRFek1pd3hNVEF6TERFeE1ESXNNVEE0TUN3eCIsInhNVFFzTVRBNE1pd3hNVEUzTERFeE16VXNNVCIsIld6RXhNVGtzTVRFMU15d3hNVEEyTERFeE5URSIsInhNVE13TERFd09ESXNNVEV4TUN3eE1EZ3hMRCJd'
	  ],
	  'Xsd%$sW', [3, 4, 2, 10, 6, 1, 8, 7, 9, 0, 5]

)
console.log(dc)