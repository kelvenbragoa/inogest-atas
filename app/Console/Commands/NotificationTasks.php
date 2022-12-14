<?php

namespace App\Console\Commands;

use App\Models\MeetingTask;
use App\Models\User;
use App\Notifications\Operation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class NotificationTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:notificationtask';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notification for 3 days to expire tasks and expired tasks';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tasks = MeetingTask::where('status',0)->get();

        foreach($tasks as $item){
            if (today() > $item->when){
                $days_expired = now()->diffInDays($item->when);
                //notifica , a task expirou a tantos dias
                $msg1 = 'Tem uma tarefa que está quase a expirar. A tarefa foi atribuida a '.$item->participant->name.' . Descrição da tarefa: '.$item->what.'.';
                if($item->participant->user_id != null){
                    $user = User::where('id',$item->participant->user_id)->get();
                    
                    Notification::send($user,new Operation($msg1));
                }
            }else{
                if(now()->diffInDays($item->when) == 1){
                    //notifica a task falta 1 dia para expirar
                    $msg2 = 'Tem uma tarefa que está quase a expirar. A tarefa foi atribuida a '.$item->participant->name.' . Descrição da tarefa: '.$item->what.'.';

                    if($item->participant->user_id != null){
                        $user = User::where('id',$item->participant->user_id)->get();
                        
                        Notification::send($user,new Operation($msg2));
                    }
                   
                }
            }
        }

        return Command::SUCCESS;
    }
}
