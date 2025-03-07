<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Message;
use Carbon\Carbon;

class DeleteOldMessages extends Command
{
    protected $signature = 'messages:delete-old';
    protected $description = 'Delete messages that are older than 24 hours and are still active';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Message::where('is_active', true)
            ->where('created_at', '<', Carbon::now()->subHours(24))
            ->delete();

        $this->info('Old messages deleted successfully.');
    }
}

