<?php
/**
 * Back-end Challenge.
 *
 * PHP version 7.2
 *
 * Este será o arquivo chamado na execução dos testes automátizados.
 *
 * @category Challenge
 * @package  Back-end
 * @author   Seu Nome <seu-email@seu-provedor.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     https://github.com/apiki/back-end-challenge
 */
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

include('class/Route.php');

Route::add('/', function(){
    echo json_response(400);
});

Route::add('/exchange', function(){
    echo json_response(400);
});

Route::add('/exchange/', function(){
    echo json_response(400);
});

Route::add('/exchange/([0-9.-]+)', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/([0-9.-]+)/([A-Z]+)', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/([0-9.-]+)/([A-Z]+)/([A-Z]+)', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/([a-z])/([A-Z]+)/([A-Z]+)/([0-9.]+)', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/([0-9.]+)/([A-Z]+)/([A-Z]+)/([a-z])', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/(-[0-9]+)/([A-Z]+)/([A-Z]+)/([0-9.]+)', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/([0-9.]+)/([A-Z]+)/([A-Z]+)/(-[0-9.]+)', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/([0-9]+)/([a-z]+)/([A-Z]+)/([0-9.]+)', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/([0-9]+)/([A-Z]+)/([a-z]+)/([0-9.]+)', function() {
    echo json_response(400);
}, 'get');

Route::add('/exchange/([0-9.]+)/([A-Z]+)/([A-Z]+)/([0-9.]+)', function($amount, $from, $to, $rate) {
    $moedas = [
        'BRL' => 'R$',
        'USD' => '$',
        'EUR' => '€'
    ];
    $result = $amount * $rate;
    $json = [
        'valorConvertido' => $result,
        'simboloMoeda'    => $moedas[$to]
    ];
    $data = json_encode($json, JSON_UNESCAPED_UNICODE);
    echo $data;
}, 'get');

Route::run('/');


function json_response($code)
{
    header_remove();
    http_response_code($code);
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
        );
    header('Status: '.$status[$code]);
    return json_encode([
        'status' => $code
    ]);
}
