$(document).ready(function() {
	/***** Tabs *****/
	//Normal Tabs - Positions are controlled by CSS classes
    $('#tab-1 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('#tab-1 li:eq(0) a').tab('show'); 
  
    $('#tab-2 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-2 li:eq(1) a').tab('show'); 
	  
	$('#tab-3 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-3 li:eq(2) a').tab('show'); 
	  
	$('#tab-4 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('#tab-4 li:eq(3) a').tab('show'); 
	  
	$('#tab-5 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('#tab-5 li:eq(4) a').tab('show'); 

	$('#tab-6 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('#tab-6 li:eq(5) a').tab('show'); 

    //TAB USER

	$('#register').click(function(){
            $('#help').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_register';
            $('#help').load(url);
            return false;
    });

    $('#lupa').click(function(){
           $('#help').html('<img src="assets/img/loading.gif"> loading...');
             var url = 'user_guide/get_lupa';
            $('#help').load(url);
            return false;
    });

    $('#cuti').click(function(){
            $('#help').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_cuti';
            $('#help').load(url);
            return false;
    });

    $('#edit').click(function(){
            $('#help').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_edit';
            $('#help').load(url);
            return false;
    });

    $('#absen').click(function(){
            $('#help').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_absen';
            $('#help').load(url);
            return false;
    });

    $('#tidak_masuk').click(function(){
            $('#help').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_tidak_masuk';
            $('#help').load(url);
            return false;
    });

    $('#pjd').click(function(){
            $('#help').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_pjd';
            $('#help').load(url);
            return false;
    });

    $('#resign').click(function(){
        $('#help').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_resign';
            $('#help').load(url);
            return false;
    });
    
    //Role Atasan

     $('#recruit').click(function(){
            $('#help2').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_recruit';
            $('#help2').load(url);
            return false;
    });

      $('#promosi').click(function(){
            $('#help2').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_promosi';
            $('#help2').load(url);
            return false;
    });

     $('#perpanjangan').click(function(){
            $('#help2').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_perpanjangan';
            $('#help2').load(url);
            return false;
    });

      $('#pengangkatan').click(function(){
            $('#help2').html('<img src="assets/img/loading.gif"> loading...');
            var url = 'user_guide/get_pengangkatan';
            $('#help2').load(url);
            return false;
    });

    $('#rekomendasi').click(function(){
        $('#help2').html('<img src="assets/img/loading.gif"> loading...');
        var url = 'user_guide/get_rekomendasi';
        $('#help2').load(url);
        return false;
    });

    // ROLE ADMIN BAGIAN

    $('#pjd_admin').click(function(){
        $('#help3').html('<img src="assets/img/loading.gif"> loading...');
        var url = 'user_guide/get_pjd_admin';
        $('#help3').load(url);
        return false;
    });

    $('#training_admin').click(function(){
        $('#help3').html('<img src="assets/img/loading.gif"> loading...');
        var url = 'user_guide/get_training_admin';
        $('#help3').load(url);
        return false;
    });

    $('#medical').click(function(){
        $('#help3').html('<img src="assets/img/loading.gif"> loading...');
        var url = 'user_guide/get_medical';
        $('#help3').load(url);
        return false;
    });


    //END TAB USER

    //TAB ATASAN

    //END TAB ATASAN


});