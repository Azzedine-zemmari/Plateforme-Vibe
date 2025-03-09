<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MessageController;

class DeleteOldMessages extends Command
{
    protected $signature = 'messages:delete-old';
    protected $description = 'Delete old messages for users who enabled auto-delete';

    public function handle()
    {
        $controller = new MessageController();
        $controller->deleteOldMessages();
        $this->info('Old messages have been deleted successfully.');
    }
}

