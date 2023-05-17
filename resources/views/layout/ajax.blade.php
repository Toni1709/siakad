<script type="text/javascript">
        $(document).ready(function(){
            $('#jurusan').change(function(e){
                console.log(e.target.value);
                var id = e.target.value;
                $("#kelas").empty();
                $("#kelas").append("<option>-- Pilih Kelas --</option>");
                $.ajax({
                    url : "{{ route('kelas') }}",
                    method : "get",
                    data: {id : id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        console.log(data);
                        console.log($("#kelas"));
                        for(let i = 0; i <= data.length; i++) {
                            $("#kelas").append("<option value='"+data[i].id_kelas+"'>"+data[i].nama_kelas+"</option>");
                        }
                    }
                });
            });        
        });
</script>