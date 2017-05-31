<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?= $titulo ?> - StudioM</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/6.0.0/normalize.min.css" type="text/css" />
        <link rel="stylesheet" href="../../../assets/css/pignose.calendar.min.css" type="text/css" />
        <style type="text/css">
    		.input-calendar {
    			display: block;
    			width: 100%;
    			max-width: 360px;
    			margin: 0 auto;
    			height: 3.2em;
    			line-height: 3.2em;
    			font: inherit;
    			padding: 0 1.2em;
    			border: 1px solid #d8d8d8;
    			box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
    			-o-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
    			-moz-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
    			-webkit-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
    		}
    
    		.btn-calendar {
    			display: block;
    			width: 100%;
    			max-width: 360px;
    			height: 3.2em;
    			line-height: 3.2em;
    			background-color: #52555a;
    			margin: 0 auto;
    			font-weight: 600;
    			color: #ffffff !important;
    			text-decoration: none !important;
    			box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
    			-o-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
    			-moz-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
    			-webkit-box-shadow: 0 4px 12px rgba(0, 0, 0, .25);
    		}
    
    		.btn-calendar:hover {
    			background-color: #5a6268;
    		}
    		
	    </style>
    </head>
    
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-xs-12">
                    <img src="../../../assets/img/logopainel.png" alt="logo">
                    <br>
                    <?= ($this->session->flashdata('alert-success')) ? '<div class="alert alert-success alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.$this->session->flashdata('alert-success').'</div>' : ''; ?>
                    <?= ($this->session->flashdata('alert-danger')) ? '<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><b>'.$this->session->flashdata('alert-danger').'</div>' : ''; ?>
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="<?= base_url(); ?>">Inicial</a></li>
                        <li><a href="<?= base_url(); ?>agendar">Agendar</a></li>
                        <li><a href="<?= base_url(); ?>financeiro">Financeiro</a></li>
                    </ul>
    
        