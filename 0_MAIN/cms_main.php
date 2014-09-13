<?php


class cms_main{


	function cms_main(){

			$oReq = new req;

			//get fid, FUNCTION ID from the request
			$fid = $oReq->tell('fid');

			if ( $fid != '999999' ){
				if ($_SESSION['pri'] !=0){
					putn ('<div class="hidarimenu">');

					if (checkprior(1, $_SESSION['pri']) ) {
						$oRendermenu=new rendermenu();
					}
					putn('</div>');
				}
			}

				switch ($fid){
				
				
				
				
				}



	}

}	
	
	