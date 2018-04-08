<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OrderService;
class OrderAuto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'auto receive and close';
    protected $orderService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OrderService $orderService)
    {
        parent::__construct();
        $this->orderService = $orderService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->orderService->autoTimer();
    }
}
