 <!-- Begin Page Content -->
 <div class="container-fluid">

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>
     <div class="row animate__animated animate__jackInTheBox">
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Valor total</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="span_total"></span></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-calendar fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Valor total pago</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="span_total_pago"></span></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Porcentagem de contas pagas</div>
                             <div class="row no-gutters align-items-center">
                                 <div class="col-auto">
                                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><span id="span_total_pago_porcent"></span></div>
                                 </div>
                                 <div class="col">
                                     <div class="progress progress-sm mr-2 porcent-div">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-warning shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Contas pendentes</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="span_total_pendent"></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-comments fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->