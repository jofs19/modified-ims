$(function(){
    $(document).on('click','.removeOrder',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Your Order will be cancelled.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34770',
                    cancelButtonColor: '#69b3fe',
                    confirmButtonText: 'Delete data'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Cancelled!',
                        'Your order has been cancelled.',
                        'success'
                      )
                    }
                  }) 


    });

  });

  $(function(){
    $(document).on('click','.removeWishlist',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Product will be removed from Wishlist.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34770',
                    cancelButtonColor: '#69b3fe',
                    confirmButtonText: 'Delete data'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Expunged!',
                        'Removed from your wishlist.',
                        'success'
                      )
                    }
                  }) 


    });

  });

  $(function(){
    $(document).on('click','.removeCompare',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Product will be removed from Compare list.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34770',
                    cancelButtonColor: '#69b3fe',
                    confirmButtonText: 'Delete data'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Expunged!',
                        'Removed from your compare list.',
                        'success'
                      )
                    }
                  }) 


    });

  });

  $(function(){
    $(document).on('click','#removeComment',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Your comment will be deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor:  '#f34770',
                    cancelButtonColor: '#69b3fe',
                    confirmButtonText: 'Delete data'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Comment has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });

  $(function(){
    $(document).on('click','.removeCoupon',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Order Discount will be removed.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34770',
                    cancelButtonColor: '#69b3fe',                    
                    confirmButtonText: 'Delete data'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Removed!',
                        'Coupon has been removed.',
                        'success'
                      )
                    }
                  }) 


    });

  });



  //Reject

  $(function(){
    $(document).on('click','#reject',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Reject the Order?',
                    text: "Once Rejected, You will not be able to revert it!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00BC8B',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Reject Order'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Rejected!',
                        'Order successfully rejected.',
                        'success'
                      )
                    }
                  }) 


    });

}); //end


// Confirm 

$(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Confirm the Order?',
                    text: "Once Confirmed, You will not be able to revert it!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00BC8B',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm Order'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Confirmed!',
                        'Order successfully confirmed.',
                        'success'
                      )
                    }
                  }) 


    });

});

// processing


$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Proccess the Order?',
                    text: "Once Processed, You will not be able to revert it!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00BC8B',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Process Order'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Processed!',
                        'Order successfully processed.',
                        'success'
                      )
                    }
                  }) 


    });

  });

//picked


$(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Pick the Order?',
                    text: "Once Picked, You will not be able to revert it!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00BC8B',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Pick Order'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Picked!',
                        'Order successfully picked.',
                        'success'
                      )
                    }
                  }) 


    });

  });

// shipped


$(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Ship the Order?',
                    text: "Once shipped, You will not be able to revert it!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00BC8B',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ship Order'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Shipped!',
                        'Order successfully shipped.',
                        'success'
                      )
                    }
                  }) 


    });

  });

  //delivered



$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Order Delivered?',
                    text: "You will not be able to revert it!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00BC8B',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Order Delivered'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Delivered!',
                        'Order successfully delivered.',
                        'success'
                      )
                    }
                  }) 


    });

  });