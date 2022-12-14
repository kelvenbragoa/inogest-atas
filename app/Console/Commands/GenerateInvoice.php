<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\Organization;
use App\Models\User;
use App\Notifications\Operation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class GenerateInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Invoices for users ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //obtem lista de todas organizações
        $organizations = Organization::orderBy('id','asc')->get();
        
       
        //itera cada organização
        foreach($organizations as $item){
            
                        if($item->employee->count() > 3 ){
                                    //armazena a data de criação da organização, utilizado no caso esta não tiver nenhuma fatura gerada.
                                    $created_at = $item->created_at->format('Y-m-d');

                                    //procura a última fatura gerada para esta organização
                                    $invoice = Invoice::where('organization_id',$item->id)->orderBy('id','desc')->first();
                                    
                                    //calcula número de funcionários registrados passado a marca de 3 grátis
                                    if($item->employee->count() > 3){

                                        $number_users = $item->employee->count() - 3;

                                    }else{

                                        $number_users = 0;

                                    }

                                    

                                    //verifica se existe uma fatura gerada para esta organização
                                    //se não existe
                                    if($invoice == null){

                                        
                                                //verifica quantos dias ja passaram desde a criação da organização
                                                $days_passed = now()->diffInDays($created_at);
                                                
                                                //se já passaram 20 ou mais dias é gerada a fatura
                                                if($days_passed >= 20){
                                                    
                                                    $user = User::where('organization_id',$item->id)->where('role_id',2)->first();

                                                    Invoice::create([
                                                        'user_id' => $user->id,
                                                        'number_users' => $number_users,
                                                        'amount' => $number_users*400,
                                                        'organization_id' => $item->id,
                                                        'start_date' => date('Y-m-d'),
                                                        'end_date' => now()->addDays(10),
                                                        'status'=>0
                                                    ]);
                                                    $msg = "Foi gerada uma nova fatura para a sua conta. Verifica nas faturas.";
                                                    Notification::send($user,new Operation($msg));

                                                    // dd($days_passed,'gerou nova fatura, primeira fatura');

                                                }else{
                                                    // dd($days_passed,'nao gera fatura, ainda nao passaram 20 dias primeira fatura');
                                                }
                                        
                                    }else{

                                                //existe fatura gerada
                                                
                                                if($invoice->status == 1){
                                                    $days_passed = now()->diffInDays($invoice->end_date);

                                                    //verifica se ja passaram 20 dias apos ser gerada a fatura.
                                                    //se ja passaram gera uma nova fatura que vence 10 dias depois
                                                    if($days_passed >=20){
                                                                $user = User::where('organization_id',$item->id)->where('role_id',2)->first();

                                                                Invoice::create([
                                                                    'user_id' => $user->id,
                                                                    'number_users' => $number_users,
                                                                    'amount' => $number_users*400,
                                                                    'organization_id' => $item->id,
                                                                    'start_date' => date('Y-m-d'),
                                                                    'end_date' => now()->addDays(10),
                                                                    'status'=>0
                                                            ]);

                                                            $msg = "Foi gerada uma nova fatura para a sua conta. Verifica nas faturas.";
                                                            Notification::send($user,new Operation($msg));
                                                            // dd('existe fatura paga, foi criado nova');
                                                    }

                                                    // dd('existe fatura paga, nao foi criada nova');

                                                }else{

                                                   
                                                    //desativa a conta
                                                    if(now() > $invoice->end_date){
                                                        $item->update([
                                                            'is_active'=>0
                                                        ]);
                                                        // dd('desativado por falta de pagamento');
                                                    }

                                                    
                                                }
                                        


                                    }
                    }
        }
        return Command::SUCCESS;
    }
}
