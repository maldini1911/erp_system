$(document).ready(function()
{
      //===> Start Datatimepicker Client
     $('#datetimepicker').datetimepicker({
        format:'Y-m-d H:i',
        inline:false,
        lang:'ar'
      });


      //===> Start Admins
      $notes = $(".notes" ).length;
      //
      if($notes > 3)
      {
        $('.parent-notes').addClass('scroll-notes');
      }

      //===> End Admins

     //====> Filter Manage Clients
    $('#filter-clients').keyup(function ()
    {
        $url = $(this).attr('url-data');
        $val = $(this).val();
        $search = $url+'/'+$val;
        $.ajax({
            url:$search,
            dataType:"JSON",
            type:"GET",
            success:function(data)
            {
                $('.show-clients').html(data.data);
                $('.show-clients li').click(function(){
                    $li = $(this).html();
                    $id = $(this).attr('id');
                    $('#filter-clients').val($li);
                    $('#client').val($id);
                });
            }
        })
    });



      //=== Filter Clients Marketing
    $('#filter-clients-marketing').keyup(function ()
    {
        $url = $(this).attr('url-data');
        $val = $(this).val();
        $search = $url+'/'+$val;
        $.ajax({
            url:$search,
            dataType:"JSON",
            type:"GET",
            success:function(data)
            {
                $('.show-clients').html(data.data);
                $('.show-clients li').click(function(){
                    $li = $(this).html();
                    $id = $(this).attr('id');
                    $('#filter-clients-marketing').val($li);
                    $('#client').val($id);

                });
            }
        })
    });


    //=== Filter Clients Programming
    $('#filter-clients-programming').keyup(function ()
    {
        $url = $(this).attr('url-data');
        $val = $(this).val();
        $search = $url+'/'+$val;
        $.ajax({
            url:$search,
            dataType:"JSON",
            type:"GET",
            success:function(data)
            {

                $('.show-clients').html(data.data);

                $('.show-clients li').click(function(){

                    //$(this).show().siblings().hide();
                    $li = $(this).html();
                    $id = $(this).attr('id');
                    $('#filter-clients-programming').val($li);
                    $('#client').val($id);

                });
            }
        })
    });

      //====> Filter Sales Clients
      $('#filter-clients-sales').keyup(function ()
      {
          $url = $(this).attr('url-data');
          $val = $(this).val();
          $search = $url+'/'+$val;
          $.ajax({
              url:$search,
              dataType:"JSON",
              type:"GET",
              success:function(data)
              {

                  $('.show-clients').html(data.data);


                  $('.show-clients li').click(function(){


                      $li = $(this).html();
                      $id = $(this).attr('id');
                      $('#filter-clients-sales').val($li);
                      $('#client').val($id);
                  });
              }
          })
      });


        //====> Filter Users Manage Clients
        $('#filter-users').keyup(function ()
        {
            $url = $(this).attr('url-data');
            $val = $(this).val();
            $search = $url+'/'+$val;
            $.ajax({
                url:$search,
                dataType:"JSON",
                type:"GET",
                success:function(data)
                {
                    $('.show-clients').html(data.data);
                    $('.show-clients li').click(function(){
                        $li = $(this).html();
                        $id = $(this).attr('id');
                        $('#filter-users').val($li);
                        $('#client').val($id);
                    });
                }
            })
        });








});
