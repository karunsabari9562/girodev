@extends('layouts.Home')
@section('title')
Refund-Policy
  @endsection
 
@section('contents')

    <!-- NAVIGATION -->
   <nav class="navbar navbar-expand-lg bg-tranparent navbar-light">
        <div class="container">
            <a href="/" class="navbar-brand"><img src="{{asset('homepage/images/logo.svg')}}" width="130" alt="Girokab Logo"
                    title="GiroKab"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link ">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="/services" class="nav-link ">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="city-long py-0">
    </section>



    <!-- APP -->
    <section class="appscreens">
        <div class="container">
            <div class="row align-items-center">
                

                <div class="col-md-12 order-md1">
                    <div class="screen-info" data-aos="fade-up">
                       
                        <h2>Refund Policy</h2>
                        <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">   Transactions, transaction price and all commercial terms such as delivery, dispatch of products and/or services  are  as  per  principal  to  principal bipartite contractual obligations between Service Agents and clients and the payment facility is merely used by Service Agents and clients to facilitate the completion of transactions. Use of the payment facility  shall  not  render GiroKab liable or responsible for non–delivery, non-receipt, non-payment, damage, breach of representations and warranties,  non-provision  of  after- sales or warranty services or fraud as regards the products and/or services listed on the Platform.
                        </p>

                         <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">  You have specifically authorized GiroKab or its service providers to collect, process, facilitate, and remit payments and/or the transaction price electronically or through payment at spot (PAS) to and from clients in respect of transactions through  payment  facility.  Your  relationship  with  GiroKab  is on a principal to principal basis and by accepting the ToU, you agree that GiroKab is an independent contractor for all purposes and does  not  have control of or liability for the services that are listed on the Platform and paid for by using the payment facility. GiroKab does not guarantee the identity of any User nor does it ensure that a client or a Service Agent will complete a transaction.
                        </p>

                         <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">  You understand, accept, and agree that the payment facility provided by GiroKab is neither a banking nor financial service, but merely a facilitator providing an electronic, automated online electronic payment facility for receiving payment, or payment at spot (PAS), collection and remittance for transactions on the Platform using the existing authorized banking infrastructure and credit card payment gateway (PG) network. Further, by providing payment facility, GiroKab neither acts as a trustee nor fiduciary with respect to transaction or transaction price.
It is hereby clarified that payment at spot (PAS) option may not be available for select time at GiroKab’s sole discretion.

                        </p>

                         <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">  All online bank transfers from valid bank accounts are processed using the gateway provided by the respective issuing bank that supports payment facility to provide these services to the users. All such online bank transfers on payment facility are also governed by the terms and conditions agreed to between a Service Agent client and the respective issuing bank.
                        </p>

                         <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">  If a customer experiences some sort of misbehavior from the drivers or and if the ride is not completed, Giro kab will be liable to refund the respective customer
                        </p>
                        
                      
                    </div>
                </div>
            </div>
            
        </div>
    </section>



    <!-- FEATURES -->
    



        @endsection