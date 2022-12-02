@extends('layout_organization.master')
@section('content')


    <div class="container-fluid p-0">
        @if (Session::has('messageSuccess'))
                       
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
                <strong>{{Session::get('messageSuccess')}}</strong>
            </div>
        </div>
        @endif
        @if (Session::has('messageError'))
    
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
                <strong>{{Session::get('messageError')}}</strong>
            </div>
        </div>
        @endif
        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                <div class="alert-icon">
                                    <i class="far fa-fw fa-bell"></i>
                                </div>
                                <div class="alert-message">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
        @endif
        <h1 class="h3 mb-3">{{__('text.invoice')}}</h1>

        <div class="row">
            <div class="col-8">
                <div class="card">
                    @if ($invoice->status == 0)
                                        <span class="badge bg-danger m-2">{{__('text.not_paid')}}</span>
                                    @else
                                        <span class="badge bg-success m-2">{{__('text.paid')}}</span>
                                    @endif 
                    <div class="card-body m-sm-3 m-md-5">
                        <img src="/storage/sys/logoinogestt.png" width="400" height="180"/>
                        <div class="mb-4">
                             <strong>{{$invoice->organization->name}}</strong>,
                            <br /> {{__('text.invoice_for_payment')}}
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted">Fatura #</div>
                                <strong>{{$invoice->id}}/{{$invoice->created_at->format('Y')}}</strong>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">{{__('text.emission_date')}}</div>
                                <strong>{{date('d-m-Y',strtotime($invoice->start_date))}}</strong>
                                <div class="text-muted">{{__('text.due_date')}}</div>
                                <strong>{{date('d-m-Y',strtotime($invoice->end_date))}}</strong>
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="text-muted">{{__('text.billed_to')}}</div>
                                <strong>
                                    {{$invoice->organization->name}}
                                </strong>
                                <p>
                                    {{$invoice->organization->address ?? ''}} <br> {{$invoice->organization->province->name ?? ''}}, {{$invoice->organization->country->name ?? ''}}<br>
                                    {{$invoice->organization->nuit}} <br>
                                   
                                </p>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">{{__('text.pay')}}</div>
                                <strong>
                                INOVATIS MZ LTD
                                </strong>
                                <p>
                                    Rua Filipe Samuel Magaia <br> Beira, Moçambique <br> Nuit:401067221<br>
                                    
                                </p>
                            </div>
                        </div>

                        <h2>{{__('text.billed_lines')}}</h2>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>{{__('text.description')}}</th>
                                    <th>{{__('text.quantity')}}</th>
                                    <th>{{__('text.amount')}}</th>
                                    <th class="text-right">{{__('text.total')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nº {{__('text.employees')}}</td>
                                    <td>{{$invoice->organization->employee->count()-3}}</td>
                                    <td>400 MT</td>
                                    <td class="text-right">{{$invoice->amount}} MT</td>
                                </tr>
                                
                                 <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Subtotal </th>
                                    <th class="text-right">{{$invoice->amount}} MT</th>
                                </tr>
                                {{--
                                <tr style="display: none" id="mpesa1">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Taxa gateway de pagamento (M-Pesa {{$invoice->amount*0.04}} MT) </th>
                                    <th class="text-right">48.00 MT</th>
                                </tr>
                                
                                <tr style="background-color: beige; display:none" id="mpesa2">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Total </th>
                                    <th class="text-right">{{$invoice->amount + $invoice->amount*0.04}} MT</th>
                                </tr>
                                <tr style="background-color: beige;" id="bank1">
                                    <th>&nbsp;</th>
                                    <th>Total </th>
                                    <th class="text-right">{{$invoice->amount}} MT</th>
                                </tr> --}}
                            </tbody>
                        </table>

                        <div id="mpesa1" style="display: none" class="mt-4 mb-4">
                            <p><strong>{{__('text.payment_gateway')}}: </strong>{{$invoice->amount*0.04}} MT</p>
                            <p><strong>{{__('text.total')}}: </strong>{{$invoice->amount + $invoice->amount*0.04}} MT</p>
                        </div>

                        <div id="bank1" class="mt-4 mb-4">
                           
                            <p><strong>{{__('text.total')}}: </strong>{{$invoice->amount}} MT</p>
                        </div>
                        

                        <hr>
                        <h2>{{__('text.transactions')}}</h2>
                        
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>{{__('text.date')}}</th>
                                    <th>{{__('text.method')}}</th>
                                    <th>{{__('text.reference')}}</th>
                                    <th class="text-right">{{__('text.amount')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice->transaction as $item)
                                <tr>
                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                    <td>{{$item->method}}</td>
                                    <td>{{$item->reference}}</td>
                                    <td class="text-right">{{$item->amount}} MT</td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <td>22/01/2022</td>
                                    <td>Mpesa</td>
                                    <td>JFOKE0902KF</td>
                                    <td class="text-right">{{$invoice->amount + 48.00}} MT</td>
                                </tr> --}}
                                
                               
                              
                                
                                <tr style="background-color: beige">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>{{__('text.balance')}} </th>
                                    <th class="text-right">
                                        @if ($invoice->status == 0)
                                        {{$invoice->amount}} MT
                                        @else
                                        0 MT
                                        @endif
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>

            <div class="col-4">
                @if ($invoice->status==0)
                    
                
                <div class="card">
                    <div class="card-header">
                        <h2>{{__('text.total_debt')}}</h2>
                    </div>
                    <div class="card-body">
                        <div class="mt-2">
                           <h1><strong>{{$invoice->amount}} MT</strong></h1>
                       </div>
                       <hr>
                       <div class="card mb-4">
                        <select name="" id="pagamento" class="form-control" onchange="pagamento()">
                            <option value="none">{{__('text.select_payment_method')}}</option>
                            <option value="mpesa">Mpesa</option>
                            <option value="banco">{{__('text.bank')}}</option>
                        </select>
                    </div>
                       <form id="form" action="/mpesa-payment" method="POST">
                        @csrf
                        <div class="col-md-12 text-md-left" id="mpesa" style="display: none">
                            <div class="card m-4">
                                <h2>{{__('text.pay')}} MPESA</h2>
                                <img width="150" height="150" src="/storage/sys/mpesa.jpg" alt="" style="border-radius: 10px">
                                <div class="form-group">
                                    <label class="form-label" for="">{{__('text.mobile')}}</label>
                                    <input class="form-control" type="number" placeholder="Ex:850110300" name="number" id="number" maxlength="9">
                                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                                    <input type="hidden" name="method" value="mpesa">
                                    <input type="hidden" name="organization_id" value="{{$invoice->organization->id}}">
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary" id="buttonSubmit">{{__('text.pay')}}</button>
                                    <div class="spinner-border text-info mr-2" role="status" id="spinner" style="display: none">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="col-md-12 text-md-left" id="banco" style="display: none">
                            <div class="card m-4">
                                <p>{{__('text.info')}} {{__('text.bank')}} - BCI</p>
                                <img width="150" height="150" src="/storage/sys/bci.png" alt="">
                                <div class="form-group">
                                    <p><strong>{{__('text.account')}}:</strong>20648021510001</p>
                                    <p><strong>NIB:</strong>0008 0000 0648 0215 1011 3</p>
                                </div>
    
                            </div>
                            <div class="card m-4">
                                <p>{{__('text.info')}} {{__('text.bank')}} - BIM</p>
                                <img width="150" height="150" src="/storage/sys/bim.png" alt="">
                                <div class="form-group">
                                    <p><strong>{{__('text.account')}}:</strong>473143885</p>
                                    <p><strong>NIB:</strong>0001 0000 0047 3143 8855 7</p>
                                </div>
                                
                            </div>
                            <p>{{__('text.open_ticket')}}: {{$invoice->id}}/{{$invoice->created_at->format('Y')}}. {{__('text.wait_confirmation')}}.</p>
                            
                            
                        </div>

                    </div>
                </div>

                <hr>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h2>{{__('text.action')}}</h2>
                        <button class="btn btn-primary">{{__('text.download')}}<i class="align-middle" data-feather="arrow-down"></i></button>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

    <script>
        function myFunction() {
          var x = document.getElementById("mySelect").value;
          var value = x*5000;
          document.getElementById("value").value = value;
        }
    
        function pagamento() {
          var x = document.getElementById("pagamento").value;
       
          if(x =='mpesa'){
            document.getElementById("mpesa").style.display = "block";
            document.getElementById("banco").style.display = "none";

            document.getElementById("mpesa1").style.display = "block";
            
            document.getElementById("bank1").style.display = "none";
          }
    
          if(x =='banco'){
            document.getElementById("banco").style.display = "block";
            document.getElementById("mpesa").style.display = "none";

            document.getElementById("mpesa1").style.display = "none";
            
            document.getElementById("bank1").style.display = "block";
            
          }
    
          if(x =='none'){
            document.getElementById("mpesa").style.display = "none";
            document.getElementById("banco").style.display = "none";

            document.getElementById("mpesa1").style.display = "none";
            
            document.getElementById("bank1").style.display = "block";
          }
    
        }
    
    
        </script>


<script>
    document.getElementById("buttonSubmit").onclick = function() {myFunction()};

    function myFunction() {

    document.getElementById('buttonSubmit').style.display = "none";
    document.getElementById('spinner').style.display = "block";
    document.getElementById('form').submit();
    }
</script>
@endsection