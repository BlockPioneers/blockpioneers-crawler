<?php
/******************************************************************************
	Original By https://github.com/stolendata/rpc-ace 
	Tuned by http://www.blockpioneers.info - Bitcointalk : BanzaiBTC
******************************************************************************/
if( isset($ace['blocks']) )
{
    echo "<table><tr><td><b>Block</b></td><td><b>Age</b></td><td><b>Type</b></td><td><b>Difficulty</b></td><td><b>Minted</b></td><td><b>TX's</b></td><td><b>Total Value Out</b></td><td><b>Hash</b></td></tr>";
    foreach( $ace['blocks'] as $block )
        echo "<tr class=\"illu\"><td><a href=\"?{$block['hash']}\">{$block['height']}</a></td><td><p title=\"{$block['time']}\">{$block['date']}</p></td><td>" . substr( $block['flags'], 0, 14 ) . "</td><td>" . sprintf( '%.8f', $block['difficulty'] ) . "</td><td> " . sprintf( '%.8f', $block['mint'] ) . "</td><td>{$block['tx_count']}</td><td> " . sprintf( '%.8f', $block['total_out'] ) . "</td><td><a href=\"?{$block['hash']}\">" . substr( $block['hash'], 0, 25 ) . '</a>...        </td></tr>';

    $newer = $query < $ace['num_blocks'] ? '<a href="?' . ( $ace['num_blocks'] - $query >= BLOCKSPERLIST ? $query + BLOCKSPERLIST : $ace['num_blocks'] ) . '">&lt; Newer</a>' : '&lt; Newer';
    $older = $query - count( $ace['blocks'] ) >= 0 ? '<a href="?' . ( $query - BLOCKSPERLIST ) . '">Older &gt;</a>' : 'Older &gt;';

    echo "<tr><td colspan=\"8\">$newer          $older</td></tr></table>";
}
// block details
elseif( isset($ace['transactions']) )
{
    echo '<center><table>';
    foreach( $ace['fields'] as $field => $val )
        if( $field == 'previousblockhash' || $field == 'nextblockhash' )
            echo "<tr><td class=\"key\">$field</td><td class=\"value\"><a href=\"?$val\">$val</a></td></tr>";
        else
            echo "<tr><td class=\"key\">$field</td><td class=\"value\">$val</td></tr>";

    foreach( $ace['transactions'] as $tx )
    {
        echo "<tr><td class=\"key\">tx</td><td class=\"value\">{$tx['id']}</td></tr>";
        foreach( $tx['outputs'] as $output )
            echo '<tr><td></td><td class="value">     ' . $output['value'] . ( isset( $tx['coinbase'] ) ? '*' : '' ) . " -&gt; {$output['address']}</td></tr>";
    }

    echo'</table></center>';

}

echo '</div></body></html>'
?>
