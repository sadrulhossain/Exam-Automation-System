
    </div>
</div>
</body>
	<!--jQuery -->
    <script src="../../assets/js/jquery.min.js" type="text/javascript"></script>
	
	<script src="../../assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
	
	<script src="../../assets/js/jquery.js" type="text/javascript"></script>
	
	<script src="../../assets/js/jquery-ui.js" type="text/javascript"></script>
	
    <script src="../../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    <!--   Core JS Files   -->
    <script src="../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../../assets/js/jquery-2.2.1.js" type="text/javascript"></script>
	<script src="../../assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="../../assets/js/jquery-1.12.4.min.js" type="text/javascript"></script>
	<script src="../../assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	<script src="../../assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="../../assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="../../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../../assets/js/bootstrap-notify.js"></script>
	
	 <!--  Google Maps Plugin    -->
    <script src="../../assets/js/google.js"></script>

 
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../../assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/demo.js"></script>
	<script type="text/javascript">
		
	
	</script>
	<script type="text/javascript">
    	$(document).ready(function(){
			var date_input=$('input[type="date"]'); //our date input has the name "date"
			var options={
				dateFormat: 'yyyy-mm-dd',
				showOn: 'both',
				changeMonth: true,
				changeYear: true
			};
			date_input.datepicker(options);
        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>