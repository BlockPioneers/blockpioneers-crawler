<?php
/******************************************************************************
	Original By https://github.com/stolendata/rpc-ace 
	Tuned by http://www.blockpioneers.info - Bitcointalk : BanzaiBTC
******************************************************************************/
?>

<!-- This script will take care of the Coinmarketcap Api -->	
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script>
		$(function () {
		    startRefresh();
		});
		function startRefresh() {
		    setTimeout(startRefresh, 10000);
                    var murl = 'http://coinmarketcap.northpole.ro/api/v4/chip.json';
                    $.getJSON('http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20json%20where%20url%3D%22' + encodeURIComponent(murl) + '%22&format=json&callback=?', function(data) {
			    jQuery('#ticker').html(data.query.results.json.price.usd);
			    jQuery('#ticker').append(' USD');
                jQuery('#tickerbtc').html(data.query.results.json.price.btc);
			    jQuery('#tickerbtc').append(' BTC');
	    jQuery('#marketcap').html(data.query.results.json.marketCap.usd);
			    jQuery('#marketcap').append(' USD');
		jQuery('#marketcapbtc').html(data.query.results.json.marketCap.btc);
			    jQuery('#marketcapbtc').append(' BTC');		
                        
                        
		    });
		}
	</script>

<?php
/*
   This is the example block explorer of RPC Ace. If you intend to use just
   the RPCAce class itself to fetch and process the array or JSON output on
   your own, you should remove this entire PHP section.
*/

$query = substr( @$_SERVER['QUERY_STRING'], 0, 64 );

if( strlen($query) == 64 )
    $ace = RPCAce::getBlock( $query );
else
{
    $query = ( $query === false || !is_numeric($query) ) ? null : abs( (int)$query );
    $ace = RPCAce::getBlockList( $query, BLOCKSPERLIST );
    $query = $query === null ? @$ace['num_blocks'] : $query;
}

if( isset($ace['err']) || RETURNJSON === true )
    die( 'RPC Ace error: ' . (RETURNJSON ? $ace : $ace['err']) );



if( empty($query) || ctype_digit($query) )



echo '<center><h1> </h1></center>';	
echo "<center><img src='./css/logo.png'></center>";

echo '<center><h1>' . COINNAME . ' Block Crawler</h1></center>';
echo '<center><h1> </h1></center>';
		


?>
<div class="coin-overview"><table>
	<tr>
		<td bgcolor="#04304c"><b>Total Blocks:</b> <?php echo $ace['num_blocks']; ?></td>
		<td bgcolor="#04304c"><b>Difficulty:</b> <?php echo $ace['current_difficulty_pos']; ?></td>
		<td bgcolor="#04304c"><b>Network Weight:</b> <?php echo $ace['stakeweight']; ?></td>
	</tr>
	<tr>
		<td bgcolor="#06436a"><b>Connections:</b> <?php echo $ace['num_connections']; ?></td>
		<td bgcolor="#06436a"><b>Version:</b> <?php echo $ace['version']; ?></td>
		<td bgcolor="#06436a"><b>Protocol:</b> <?php echo $ace['protocol']; ?></td>
	</tr>
	<tr>
		<td bgcolor="#165781"><b>Total Coins:</b> <?php echo   sprintf( '%.8f', $ace['moneysupply'])  ; ?></td>
		<td bgcolor="#165781"><b>Price:</b> <span id="tickerbtc">Loading...</span> / <span id="ticker">Loading...</span></td>
		<td bgcolor="#165781"><b>Market Capitalization:</b> <span id="marketcapbtc">Loading...</span> / <span id="marketcap">Loading...</span></td>
	</tr>
</table></div>