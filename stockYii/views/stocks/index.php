<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;
$stockSymbol=$_GET['stockSymbol'];
echo $stockSymbol;
 

?>

<div class="shorts-index">

    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div id="stocktwits-widget-news"></div><a href='https://stocktwits.com' style='font-size: 0px;'>StockTwits</a>
<script type="text/javascript" src="https://api.stocktwits.com/addon/widget/2/widget-loader.min.js"></script>
<script type="text/javascript">
STWT.Widget({container: 'stocktwits-widget-news', symbol: '<?php echo $stockSymbol;?>', width: '800', height: '300', limit: '30', scrollbars: 'true', streaming: 'true', title: 'Stock Twits', style: {link_color: '4871a8', link_hover_color: '4871a8', header_text_color: '000000', border_color: 'cecece', divider_color: 'cecece', divider_color: 'cecece', divider_type: 'solid', box_color: 'f5f5f5', stream_color: 'ffffff', text_color: '000000', time_color: '999999'}});
</script>

