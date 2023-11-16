<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class TelegramNotification extends Command
{
    protected $signature = 'app:telegram-notification';
    protected $description = 'Send notification to Telegram';

    public function handle()
    {
        $telegramToken = '6779067961:AAG3WgX-IdjBeWGqiLlGloNI_x1vkDTjemU';
        $chatId = '936780987';
        $message = 'New commit on GitLab!';

        $client = new Client();
        $client->post("https://api.telegram.org/bot{$telegramToken}/sendMessage", [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => $message,
            ],
        ]);

        $this->info('Notification sent to Telegram.');
    }
}





// namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use GuzzleHttp\Client;

// class TelegramNotification extends Command
// {
//     protected $signature = 'app:telegram-notification';
//     protected $description = 'Send detailed project notification to Telegram on push';

//     public function handle()
//     {
//         $telegramToken = '6779067961:AAG3WgX-IdjBeWGqiLlGloNI_x1vkDTjemU';
//        $chatId = '936780987';

//         $data = json_decode(file_get_contents('php://input'), true);
//         $this->info(json_encode($data));
//         if (isset($data['object_kind']) && $data['object_kind'] === 'push') {
//             $userName = $data['user_name'];
//             $projectName = $data['project']['name'];
//             $branch = $data['ref'];
//             $commitMessage = $data['commits'][0]['message'];
//             $commitDate = $data['commits'][0]['timestamp'];

//             $message = "Git Push Notification\n";
//             $message .= "User: $userName\n";
//             $message .= "Project: $projectName\n";
//             $message .= "Branch: $branch\n";
//             $message .= "Commit Message: $commitMessage\n";
//             $message .= "Commit Date: $commitDate\n";

//             $this->sendTelegramMessage($telegramToken, $chatId, $message);
//             $this->info('Project Notification sent to Telegram.');
//         } else {
//             $this->error('Invalid GitLab webhook payload or not a push event.');
//         }
//     }

//     private function sendTelegramMessage($token, $chatId, $message)
//     {
//         $client = new Client();
//         $client->post("https://api.telegram.org/bot{$token}/sendMessage", [
//             'form_params' => [
//                 'chat_id' => $chatId,
//                 'text' => $message,
//             ],
//         ]);
//     }
// }




// namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use GuzzleHttp\Client;

// class TelegramProjectNotification extends Command
// {
//     protected $signature = 'app:telegram-notification';
//     protected $description = 'Send detailed project notification to Telegram on push';

//     public function handle()
//     {
//         $telegramToken = '6779067961:AAG3WgX-IdjBeWGqiLlGloNI_x1vkDTjemU';
//         $chatId = '936780987';

//         $data = json_decode(file_get_contents('php://input'), true);

//         if ($data) {
//             $this->info('Received valid payload.');

//             if (isset($data['object_kind']) && $data['object_kind'] === 'push') {
//                 $userName = $data['user_name'];
//                 $projectName = $data['project']['name'];
//                 $branch = $data['ref'];
//                 $commitMessage = $data['commits'][0]['message'];
//                 $commitDate = $data['commits'][0]['timestamp'];

//                 $message = "Git Push Notification\n";
//                 $message .= "User: $userName\n";
//                 $message .= "Project: $projectName\n";
//                 $message .= "Branch: $branch\n";
//                 $message .= "Commit Message: $commitMessage\n";
//                 $message .= "Commit Date: $commitDate\n";

//                 $this->sendTelegramMessage($telegramToken, $chatId, $message);
//                 $this->info('Project Notification sent to Telegram.');
//             } else {
//                 $this->error('Invalid GitLab webhook payload or not a push event.');
//             }
//         } else {
//             $this->error('Received invalid payload.');
//         }
//     }

//     private function sendTelegramMessage($token, $chatId, $message)
//     {
//         $client = new Client();
//         $client->post("https://api.telegram.org/bot{$token}/sendMessage", [
//             'form_params' => [
//                 'chat_id' => $chatId,
//                 'text' => $message,
//             ],
//         ]);
//     }
// }
