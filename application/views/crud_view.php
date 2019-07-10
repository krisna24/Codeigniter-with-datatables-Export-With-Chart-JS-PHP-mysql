<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Uas Web Enterprise Mercubuana</title>
  <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url().'assets/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.css'?>" rel="stylesheet" type="text/css"/>
  
</head>
<body class="bg-info">
	<section>	
		<div class="row">
				<nav class="navbar navbar-dark bg-dark" style="background-color: #ffffff; color:dodgerblue;">
					<div class="container-fluid">
						<div class="col-md-12">
							<img class="d-inline-block img-responsive"  src="<?php echo base_url().'assets/images/logoumb.png'?>" width="90" height="90" alt="">
								<h2>UNIVERSITAS MERCUBUANA</h2> 
						</div>	
					</div>
				</nav>
			</div>
	</section>
  <div class="container-fluid">
  	<div class="row">
		<div class="col-md-8">
				<button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd"style="box-shadow: 10px 10px 5px grey;">Tambah data</button>
			<p></p>
				<table class="table" id="mytable" style="box-shadow: 10px 10px 5px grey; background:limegreen; border-radius:10px;">
			<thead >
				<tr>
				<th >No</th>
				<th >Kode barang</th>
				<th>Nama Barang</th>
				<th>harga</th>
				<th>kondisi</th>
				<th>jenis</th>
				<th>Jumlah Stok</th>
				<th>Opsi</th>
				</tr>
				</thead>
				<tbody style="color:black;">
			<?php 
				$no=0;
				foreach ($data->result_array() as $i) :
				$no++;
				$barang_kode=$i['barang_kode'];
				$barang_nama=$i['barang_nama'];
				$barang_harga=$i['barang_harga'];
				$barang_kondisi=$i['barang_kondisi'];
				$barang_jenis=$i['barang_jenis'];
				$stok=$i['stok'];
				?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $barang_kode;?></td>
				<td><?php echo $barang_nama;?></td>
				<td><?php echo $barang_harga;?></td>
				<td><?php echo $barang_kondisi;?></td>
				<td><?php echo $barang_jenis;?></td>
				<td><?php echo $stok;?></td>
				
				<td>
								<a class="btn" data-toggle="modal" data-target="#ModalUpdate<?php echo $barang_kode;?>"><span class=" btn btn-info">Edit</span></a>      
								<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $barang_kode;?>"><span class=" btn btn-danger">Del</span></a>      
				
				</td>
			</tr>
			<?php endforeach?>
			</thead>
			</table>
		</div>
  
	  <?php
           foreach($chart as $chart){
                        $stoks[] = (float) $chart->stoks;
                    }
                ?>
		<div class="col-md-4" style="margin-top:5%;">
		<div class="row">
		<script>
		$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
		</div>
			<table class="table bg-success" style="box-shadow: 10px 10px 5px grey; border-radius:10px;">
			  <thead>
				<tr>
				  <th>Nama</th>
				  <th>NIM</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>Krisna Rahmat</td>
				  <td>41816210002</td>
				</tr>
				
			  </tbody>
			</table>
			<h3 class="card-title text-bold"><b>Grafik Barang Berdasarkan jenis</b></h3>
				<canvas id="canvas" width="400" height="250" style="box-shadow: 10px 10px 5px grey;"></canvas>
		</div>
		
  	</div>
  </div>
	<!-- Modal Add Produk-->
	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/simpan'?>" method="post">
	     <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Add New</h4>
	               </div>
	               <div class="modal-body">
	                   <div class="form-group">
	                       <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
	                   </div>
										 <div class="form-group">
	                       <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
	                   </div>
					   <div class="form-group">
					   <select name="barang_kondisi" class="form-control" placeholder="kondisi barang" required>
								<option value="baru">Baru</option>
								<option value="bekas">bekas</option>
						</select>
 	                   </div>
						<div class="form-group">
						<select name="barang_jenis" class="form-control" placeholder=" barang jenis" required>
								<option value="jaringan">Jaringan</option>
								<option value="peralatan">peralatan</option>
								<option value="pekakas">pekakas</option>
						</select>
 	                   </div>
						<div class="form-group">
	                       <input type="text" name="stok" class="form-control" placeholder="stok" required>
	                   </div>
										 <div class="form-group">
	                       <select name="kategori" class="form-control" placeholder="Kode Barang" required>
													  <?php foreach ($kategori->result() as $row) :?>
													 		<option value="<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></option>
													 	<?php endforeach;?>
												 </select>
	                   </div>
										 <div class="form-group">
	                       <input type="text" name="harga" class="form-control" placeholder="Harga" required>
	                   </div>

	               </div>
	               <div class="modal-footer">
	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                  	<button type="submit" id="add-row" class="btn btn-success">Save</button>
	               </div>
	      			</div>
	        </div>
	     </div>
	 </form>
	 <?php 

		foreach ($data->result_array() as $i) :
		   $no++;
		   $barang_kode=$i['barang_kode'];
		   $barang_nama=$i['barang_nama'];
		   $barang_harga=$i['barang_harga'];
		   $barang_kondisi=$i['barang_kondisi'];
		   $barang_jenis=$i['barang_jenis'];
		   $stok=$i['stok'];
		?>
	 <!-- Modal Update Produk-->
 	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/update'?>" method="post">
 	     <div class="modal fade" id="ModalUpdate<?php echo $barang_kode;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	        <div class="modal-dialog">
 	           <div class="modal-content">
 	               <div class="modal-header">
 	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	                   <h4 class="modal-title" id="myModalLabel">Update Produk</h4>
 	               </div>
 	               <div class="modal-body">
 	                   <div class="form-group">
 	                       <input type="text" name="kode_barang" value="<?php echo $barang_kode;?>" class="form-control" placeholder="Kode Barang" required>
 	                   </div>
 						<div class="form-group">
 	                       <input type="text" name="nama_barang" value="<?php echo $barang_nama;?>" class="form-control" placeholder="Nama Barang" required>
 	                   </div>
						<div class="form-group">
						<select name="barang_kondisi" class="form-control" placeholder="kondisi barang" required>
								<option value="baru">Baru</option>
								<option value="bekas">bekas</option>
						</select>
 	                   </div>
						<div class="form-group">
						<select name="barang_jenis" class="form-control" placeholder=" barang jenis" required>
								<option value="jaringan">Jaringan</option>
								<option value="peralatan">peralatan</option>
								<option value="pekakas">pekakas</option>
						</select>
						</div>
						<div class="form-group">
	                       <input type="text" name="stok" class="form-control" value="<?php echo $stok;?>" placeholder="stok" required>
	                   </div>
 										 
 										 <div class="form-group">
 	                       <input type="text" name="harga" value="<?php echo $barang_harga;?>" class="form-control" placeholder="Harga" required>
 	                   </div>

 	               </div>
 	               <div class="modal-footer">
 	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                  	<button type="submit" id="add-row" class="btn btn-success">Update</button>
 	               </div>
 	      			</div>
 	        </div>
 	     </div>
 	 </form>
	  <?php endforeach?>
	  <?php 

foreach ($data->result_array() as $i) :
   $no++;
   $barang_kode=$i['barang_kode'];
   $barang_nama=$i['barang_nama'];
?>
	 <!-- Modal Hapus Produk-->
 	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/delete'?>" method="post">
 	     <div class="modal fade" id="ModalHapus<?php echo $barang_kode;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	        <div class="modal-dialog">
 	           <div class="modal-content">
 	               <div class="modal-header">
 	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	                   <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
 	               </div>
 	               <div class="modal-body">
 	                       <input type="hidden" value="<?php echo $barang_kode;?>" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
												 <strong>Anda yakin mau menghapus record ini? <?php echo $barang_nama;?></strong>
 	               </div>
 	               <div class="modal-footer">
 	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                  	<button type="submit" id="add-row" class="btn btn-success">Hapus</button>
 	               </div>
 	      			</div>
 	        </div>
 	     </div>
 	 </form>
	  <?php endforeach?>
	 
<script type="text/javascript" src="<?php echo base_url().'assets/chartjs/Chart.bundle.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.datatables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.bootstrap.js'?>"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/fc-3.2.4/fh-3.1.3/r-2.2.1/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
<script>$(document).ready(function () {
        $('#mytable').DataTable({
            //Dom Gösterim şekli B-> buttonlar l-> lengthMenu f-> filtre vs.
            dom:"<'row'<'col-sm-6 'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-9'i><'col-sm-3 'B>>" +
                "<'row'<'col-sm-7  col-centered'p>>",
            lengthMenu: [
                [10, 15, 25, 50, -1],
                [15, 15, 25, 50, "All"]
            ],
			
            //Dil
            language: {
                select: {
                    rows: "%d Row selected."
                },

                url: "http://cdn.datatables.net/plug-ins/1.10.12/i18n/English.json"
            },
            buttons: [{
                    extend: "print",
                    text: "Print",
                    exportOptions: {
                        orthogonal: 'export',
                        columns: ':visible'
                    },
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        orthogonal: 'export'
                    },
                    text: "Excel",
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        orthogonal: 'export'
                    },
                    text: "PDF",
                }
            ],
            "order": [],
            responsive: true
			
        });
    });
</script>
</script>

<script>
            var ctx = document.getElementById("canvas");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['jaringan','peralatan','pekakas'],
                    datasets: [{
                            label: 'chart',
                            data:<?php echo json_encode($stoks);?>,
                            backgroundColor: [
                                '#51f0a5',
                                '#ff0080',
                                '#ff8000',
                                '#ed3267',
                                '#4362fa',
                                '#95a3e8'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
</body>
</html>
