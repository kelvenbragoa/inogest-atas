<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Organization;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class InvoiceController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('organization');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        App::setLocale(auth()->user()->lang);
        $invoice = Invoice::orderBy('id','desc')->where('organization_id',Auth::user()->organization_id)->get();
        return view('organization.invoice.index', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        App::setLocale(auth()->user()->lang);
        $invoice = Invoice::find($id);


        return view('organization.invoice.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function generate(){

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
    }



    public function mpesapayment(Request $request){
        $data = $request->all();
        $request->validate([
            'number' => ['required','numeric'],
           
        ]);
        $string = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($x)) )),1,3);
        $invoice = Invoice::find($data['invoice_id']);
        $organization = Organization::find($invoice->organization_id);
        $ref = 'INA'.$invoice->id.$string;
        $reference = $ref;
        $third_party_reference = $ref;
        $amount = $invoice->amount + $invoice->amount*0.04;
        $msisdn = $data['number'];

        $config = \abdulmueid\mpesa\Config::loadFromFile('config.php');
        $transactionmpesa = new \abdulmueid\mpesa\Transaction($config);

        $c2b = $transactionmpesa->c2b(
            1,//$amount,
            
            $msisdn,
            $reference,
            $third_party_reference
        );

        if($c2b->getCode() === 'INS-0') {

            Transaction::create([
                'reference' => $reference,
                'amount' => $amount,
                'invoice_id' => $data['invoice_id'],
                'method' => 'Mpesa-'.$msisdn,
                'organization_id' => $data['organization_id'],
    
    
            ]);

            $invoice->update([
                'status'=>1
            ]);

            $organization->update([
                'is_active'=>1
            ]);

            return back()->with('messageSucess','A sua fatura foi paga com sucesso');
        }

        if($c2b->getCode() === 'INS-1') {

            return back()->with('messageError', 'Erro interno, volte a tentar novamente');

        }

        if($c2b->getCode() === 'INS-2') {
            //API INVALIDA
            return back()->with('messageError', 'Erro interno, volte a tentar novamente');

        }

        if($c2b->getCode() === 'INS-4') {
            //API INVALIDA, USUARIO NAO ATIVO
            return back()->with('messageError', 'Erro interno, volte a tentar novamente');

        }

        if($c2b->getCode() === 'INS-5') {
            //API INVALIDA, USUARIO CANCELOU
            return back()->with('messageError', 'Transação cancelado pelo usuário');

        }

        if($c2b->getCode() === 'INS-6') {
            //API INVALIDA, Transaçãp falhou
            return back()->with('messageError', 'Transação falhou');

        }

        if($c2b->getCode() === 'INS-9') {
            //API INVALIDA, REQUEST TIMEOUT
            return back()->with('messageError', 'O tempo expirou. Volte a tentar');

        }

        if($c2b->getCode() === 'INS-10') {
        
            return back()->with('messageError', 'Transação duplicada');

        }
        if($c2b->getCode() === 'INS-16') {
        
            return back()->with('messageError', 'Erro interno volte mais tarde');

        }

        if($c2b->getCode() === 'INS-2006') {
        
            return back()->with('messageError', 'Saldo insuficiente');

        }

        if($c2b->getCode() === 'INS-2051') {
        
            return back()->with('messageError', 'Número de telefone inválido');

        }




        
    }
}
