<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\Exception\InvalidEventRequestException;
use LINE\LINEBot\Exception\InvalidSignatureException;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use App\Http\Controllers\LineWebHookController;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ItemsController extends Controller
{

    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        Item::create($request->all());

        $userId = 'Ue6d78314cebae922a927abce874ebeb4';

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('LINE_BOT_CHANNEL_TOKEN'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_BOT_CHANNEL_SECRET')]);

        $multiMessageBuilder = new MultiMessageBuilder();
        $multiMessageBuilder->add(new TextMessageBuilder(json_encode(Item::latest()->first())));
        $response = $bot->pushMessage($userId, $multiMessageBuilder);

        // if($item->save()){
        //     Artisan::call('push:message', [
        //         'userId' => 'U1e25a7ce8e3e826b9aa5899adc321a67'
        //     ]);
        // }
    }

    public function show(Item $item)
    {
        return $item;
    }
}