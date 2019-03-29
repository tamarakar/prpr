<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

include '../src/library/num2str.php';

function generateResponse($request, $data){
	return [
		'url' => (string)$request->getUri(),
		'response' => [$data],
		'method' => $request->getMethod() 
	];
}

$app->get('/api/numtostr/{number}', function(Request $request, Response $response, array $args){
	$number = $args['number'];
	$data = array('result' => num2str($number , null));
    return $response->withJson(generateResponse($request, $data));
});

$app->get('/api/quadraticEquation', function(Request $request, Response $response, array $args){
	$allParams = $request->getQueryParams();
	$a = $allParams['a'];
	$b = $allParams['b'];
	$c = $allParams['c'];
	
	$result = '';

	$D = $b*$b - (4 * $a * $c);
	
	if ($D > 0) {
	    $x1 = ($b * (-1) + bcsqrt($D, 3)) / (2 * $a);
	    $x2 = ($b * (-1) - bcsqrt($D, 3)) / (2 * $a);
	} elseif ($D < 0) {
	    $result = 'Корни не вещественные числа';
	} else {
	    $x1 = -$b / (2 * $a);
	    $x2 = -$b / (2 * $a);
	}
	
	if (isset($x1)) {
	    $result = 'Корни уравнения равны: ' . $x1 . ' и ' . $x2;
	}

	$data = array('result' => $result);
    return $response->withJson(generateResponse($request, $data));
});

$app->get('/api/daybydate', function(Request $request, Response $response, array $args){
	$allParams = $request->getQueryParams();
	$date = $allParams['date'];

	$result = strftime("%a, %d/%m/%Y", strtotime($date));

	$data = array('result' => $result);
    return $response->withJson(generateResponse($request, $data));
});
$app->get('/api/fibonacci/{number}', function(Request $request, Response $response, array $args){
	$number = $args['number'];
	$result = round(pow((sqrt(5)+1) / 2, $number) / sqrt(5));
	$data = [
		'result' => $result
	];
	return $response->withJson(generateResponse($request, $data));
});

$app->get('/api/regionRussia/{number}', function(Request $request, Response $response, array $args){
	$number = $args['number'];
	$codes = [];
	$codes[1] = 'Республика Адыгея';
	$codes[2] = 'Республика Башкортостан';
	$codes[3] = 'Республика Бурятия';
	$codes[4] = 'Республика Алтай';
	$codes[5] = 'Республика Дагестан';
	$codes[6] = 'Республика Ингушетия';
	$codes[7] = 'Кабардино-Балкарская Республика';
	$codes[8] = 'Республика Калмыкия';
	$codes[9] = 'Карачаево-Черкесская Республика';
	$codes[10] = 'Республика Карелия';
	$codes[11] = 'Республика Коми';
	$codes[12] = 'Республика Марий Эл';
	$codes[13] = 'Республика Мордовия';
	$codes[14] = 'Республика Саха (Якутия)';
	$codes[15] = 'Республика Северная Осетия - Алания';
	$codes[16] = 'Республика Татарстан';
	$codes[17] = 'Республика Тыва';
	$codes[18] = 'Удмуртская Республика';
	$codes[19] = 'Республика Хакасия';
	$codes[20] = 'Чеченская республика';
	$codes[21] = 'Чувашская Республика';
	$codes[22] = 'Алтайский край';
	$codes[23] = 'Краснодарский край';
	$codes[24] = 'Красноярский край';
	$codes[25] = 'Приморский край';
	$codes[26] = 'Ставропольский край';
	$codes[27] = 'Хабаровский край';
	$codes[28] = 'Амурская область';
	$codes[29] = 'Архангельская область';
	$codes[30] = 'Астраханская область';
	$codes[31] = 'Белгородская область';
	$codes[32] = 'Брянская область';
	$codes[33] = 'Владимирская область';
	$codes[34] = 'Волгоградская область';
	$codes[35] = 'Вологодская область';
	$codes[36] = 'Воронежская область';
	$codes[37] = 'Ивановская область';
	$codes[38] = 'Иркутская область';
	$codes[39] = 'Калининградская область';
	$codes[40] = 'Калужская область';
	$codes[41] = 'Камчатский край';
	$codes[42] = 'Кемеровская область';
	$codes[43] = 'Кировская область';
	$codes[44] = 'Костромская область';
	$codes[45] = 'Курганская область';
	$codes[46] = 'Курская область';
	$codes[47] = 'Ленинградская область';
	$codes[48] = 'Липецкая область';
	$codes[49] = 'Магаданская область';
	$codes[50] = 'Московская область';
	$codes[51] = 'Мурманская область';
	$codes[52] = 'Нижегородская область';
	$codes[53] = 'Новгородская область';
	$codes[54] = 'Новосибирская область';
	$codes[55] = 'Омская область';
	$codes[56] = 'Оренбургская область';
	$codes[57] = 'Орловская область';
	$codes[58] = 'Пензенская область';
	$codes[59] = 'Пермский край';
	$codes[60] = 'Псковская область';
	$codes[61] = 'Ростовская область';
	$codes[62] = 'Рязанская область';
	$codes[63] = 'Самарская область';
	$codes[64] = 'Саратовская область';
	$codes[65] = 'Сахалинская область';
	$codes[66] = 'Свердловская область';
	$codes[67] = 'Смоленская область';
	$codes[68] = 'Тамбовская область';
	$codes[69] = 'Тверская область';
	$codes[70] = 'Томская область';
	$codes[71] = 'Тульская область';
	$codes[72] = 'Тюменская область';
	$codes[73] = 'Ульяновская область';
	$codes[74] = 'Челябинская область';
	$codes[75] = 'Забайкальский край';
	$codes[76] = 'Ярославская область';
	$codes[77] = 'Москва';
	$codes[78] = 'Санкт-Петербург';
	$codes[79] = 'Еврейская автономная область';
	$codes[80] = 'Забайкальский край';
	$codes[81] = 'Пермский край';
	$codes[82] = 'Республика Крым';
	$codes[83] = 'Ненецкий автономный округ';
	$codes[84] = 'Красноярский край';
	$codes[85] = 'Иркутская область';
	$codes[86] = 'Ханты-Мансийский АО';
	$codes[87] = 'Чукотский автономный округ';
	$codes[88] = 'Красноярский край';
	$codes[89] = 'Ямало-Ненецкий автономный округ';
	$codes[90] = 'Московская область';
	$codes[91] = 'Калининградская область';
	$codes[92] = 'Севастополь';
	$codes[93] = 'Краснодарский край';
	$codes[94] = 'Байконур';
	$codes[95] = 'Чеченская республика';
	$codes[96] = 'Свердловская область';
	$codes[97] = 'Москва';
	$codes[98] = 'Санкт-Петербург';
	$codes[99] = 'Москва';
	$codes[101] = 'Республика Адыгея';
	$codes[102] = 'Республика Башкортостан';
	$codes[103] = 'Республика Бурятия';
	$codes[109] = 'Карачаево-Черкесская Республика';
	$codes[111] = 'Республика Коми';
	$codes[113] = 'Республика Мордовия';
	$codes[116] = 'Республика Татарстан';
	$codes[118] = 'Удмуртская Республика';
	$codes[121] = 'Чувашская Республика';
	$codes[123] = 'Краснодарский край';
	$codes[124] = 'Красноярский край';
	$codes[125] = 'Приморский край';
	$codes[126] = 'Ставропольский край';
	$codes[134] = 'Волгоградская область';
	$codes[136] = 'Воронежская область';
	$codes[138] = 'Иркутская область';
	$codes[142] = 'Кемеровская область';
	$codes[150] = 'Московская область ';
	$codes[152] = 'Нижегородская область';
	$codes[154] = 'Новосибирская область';
	$codes[159] = 'Пермский край';
	$codes[161] = 'Ростовская область';
	$codes[163] = 'Самарская область';
	$codes[164] = 'Саратовская область';
	$codes[173] = 'Ульяновская область';
	$codes[174] = 'Челябинская область';
	$codes[176] = 'Ярославская область';
	$codes[177] = 'Москва';
	$codes[178] = 'Санкт-Петербург';
	$codes[186] = 'Ханты-Мансийский АО';
	$codes[190] = 'Московская область';
	$codes[196] = 'Свердловская область';
	$codes[197] = 'Москва';
	$codes[199] = 'Москва';
	$codes[716] = 'Республика Татарстан';
	$codes[750] = 'Московская область';
	$codes[763] = 'Самарская область';
	$codes[777] = 'Москва';
	$codes[799] = 'Москва';
	$result = $codes[$number];
	$data = array('result' => $result);
    return $response->withJson(generateResponse($request, $data));
});
