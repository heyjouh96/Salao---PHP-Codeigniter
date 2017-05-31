               
        </div>
        
        
        
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/moment.latest.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="../../../assets/js/jquery.mask.js"></script>
    <script src="../../../assets/js/pignose.calendar.js"></script>
    <script>

        $(document).ready(function(){
            
            $('.hora').mask('H0:M0', {
				translation: {
					'H': {
		                pattern: /[0-2]/
		            },
		            'M': {
		                pattern: /[0-5]/
		            }
				}
			});
        	
        });
        
        $("#json").click(function(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "<?= base_url() ?>paginas/testeJson",
                success: function (resposta) {
                    var dados = resposta;
                    dados.forEach(function(x){
                        var p = document.createElement("p");
                        p.innerHTML = x["nome"];
                        $("#resposta").append(p);
                    })
                },
            });
        });
        
        $("#pesq").click(function(){
            var nome = $("#nome").val();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "<?= base_url() ?>paginas/pesquisaJson",
                success: function (resposta) {
                    var dados = resposta;
                    dados.forEach(function(x){
                        var p = document.createElement("p");
                        p.innerHTML = x["nome"];
                        $("#resposta").append(p);
                    })
                },
                data: {nome: nome}
            });
        });
        
        $("#nome").on("input", function(){
            var nome = $("#nome").val();
            if(nome === ""){
                $("#resposta").html("");
            }
            else{
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "<?= base_url() ?>paginas/pesquisaJson",
                    /*beforeSend: function() {
                        $('#resposta').html('<img src="../../assets/img/loading.gif">');    
                    },*/
                    success: function (resposta) {
                        var dados = resposta;
                        $("#resposta").html("");
                        dados.forEach(function(x){
                            var p = document.createElement("p");
                            p.innerHTML = x["nome"];
                            $("#resposta").append(p);
                        })
                    },
                    data: {nome: nome}
                });
            }
        });
        
    </script>
    <script>
        
        $(function() {
    	    $('#wrapper .version strong').text('v' + $.fn.pignoseCalendar.ComponentVersion);
    		function onSelectHandler(date, context) {
    			/**
    			 * @date is an array which be included dates(clicked date at first index)
    			 * @context is an object which stored calendar interal data.
                 * @context.calendar is a root element reference.
    			 * @context.calendar is a calendar element reference.
    			 * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
                 * @context.storage.events is all events associated to this date
    			 */

                var $element = context.element;
    			var $calendar = context.calendar;
    			var $box = $element.siblings('.box').show();
    			var text = '';

    			if(date[0] !== null) {
    				text += date[0].format('YYYY-MM-DD');
    			}

    			if(date[0] !== null && date[1] !== null) {
    				text += ' ~ ';
    			} else if(date[0] === null && date[1] == null) {
    				text += 'nothing';
    			}

    			if(date[1] !== null) {
    				text += date[1].format('YYYY-MM-DD');
    			}
    			
                window.location = "<?= base_url() ?>paginas/index/"+text;
    		}

            function onApplyHandler(date, context) {
                /**
                 * @date is an array which be included dates(clicked date at first index)
                 * @context is an object which stored calendar interal data.
                 * @context.calendar is a root element reference.
                 * @context.calendar is a calendar element reference.
                 * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
                 * @context.storage.events is all events associated to this date
                 */
    
                var $element = context.element;
                var $calendar = context.calendar;
                var $box = $element.siblings('.box').show();
                var text = '';
    
                if(date[0] !== null) {
                    text += date[0].format('YYYY-MM-DD');
                }
    
                if(date[0] !== null && date[1] !== null) {
                    text += ' ~ ';
                } else if(date[0] === null && date[1] == null) {
                    text += 'nothing';
                }
    
                if(date[1] !== null) {
                    text += date[1].format('YYYY-MM-DD');
                }
                
                window.location = "<?= base_url() ?>paginas/index/"+text;
                
            }

      		// Default Calendar
      		$('.calendar').pignoseCalendar({
                select: onSelectHandler,
                lang: 'pt'
      		});
    
        });

        
    </script>
</html>