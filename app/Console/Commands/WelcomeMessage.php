<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WelcomeMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'welcome:message {name : 用户名} {--city= : 来自的城市}';
//    protected $signature = 'welcome:message';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'print welcome message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('欢迎来自'.$this->option('city').'的'.$this->argument('name').'学习laravel');
        /*
        $name = $this->ask('你叫什么名字？');
        $city = $this->choice('你来自哪个城市？', [
            '赤峰',
            '北京',
            '湘潭',
            '深圳',
        ], 0);
        $password = $this->secret('输入密码才能执行此命令');
        if ($password != '123456') {
            $this->error('密码错误');
            exit(-1);
        }
        if ($this->confirm('确定要执行此命令吗？')) {
            $this->info('欢迎来自 '.$city.' 的 '.$name.' 学习laravel!');
        } else {
            exit(0);
        }
        */

        /*
        $headers = ['姓名', '城市'];
        $data = [
            ['王老二', '绥中'],
            ['老郑', '嘉峪关'],
            ['于建松', '赤峰'],
        ];
        $this->table($headers, $data);
        */

        /*
        $totalUnits = 10;
        $this->output->progressStart($totalUnits);
        $i = 0;
        while ($i++ < $totalUnits) {
            sleep(3);
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();
        */
    }

}
