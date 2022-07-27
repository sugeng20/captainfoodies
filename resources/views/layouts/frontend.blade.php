<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description"
        content="Captain Foodies Tempat Jualanya Snack dan Foods Kesukaan Anda, Siap menemani harimu dengan gembira" />
    <meta name="keywords" content="captain foodies, captain, foodies, snacks, shabat pintar" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- SEO Meta description -->
    <meta name="description" content="Captain Foodies">
    <meta name="author" content="Sahabat Pintar">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="Captain Foodies" /> <!-- website name -->
    <meta property="og:site" content="{{ url('/') }}" /> <!-- website link -->
    <meta property="og:title" content="Captain Foodies" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="Captain Foodies" />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="{{ url('/') }}/img/logo-cf.png" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="{{ url('/') }}" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <title>@yield('title') | Captainfoodies</title>

    <!--favicon icon-->
    <link rel="icon" href="{{ url('/') }}/img/logo-cf.png" type="image/png" sizes="16x16">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ url('/') }}/img/logo-cf.png" rel="apple-touch-icon">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/themify-icons.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css" type="text/css" />
    @stack('add-css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('includes.frontend.header')
    <!-- Header End Section -->

    <!-- Content Section Begin -->
    @yield('content')
    <!-- Content End Section -->

    <!-- Footer Section Begin -->
    @include('includes.frontend.footer')
    <!-- Footer End Section -->

    <!-- Js Plugins -->
    <script src="{{ url('/') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/js/jquery-ui.min.js"></script>
    <script src="{{ url('/') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ url('/') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('/') }}/js/jquery.zoom.min.js"></script>
    <script src="{{ url('/') }}/js/jquery.dd.min.js"></script>
    <script src="{{ url('/') }}/js/jquery.slicknav.js"></script>
    <script src="{{ url('/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('/') }}/js/main.js"></script>

    <script>
        var keranjangUser = [];
        if (localStorage.getItem("keranjangUser")) {
            try {
                keranjangUser = JSON.parse(localStorage.getItem("keranjangUser"));
            } catch (e) {
                localStorage.removeItem("keranjangUser");
            }
        }
        function formatRupiah(angka, prefix){
            var number_string   = String(angka).replace(/[^,\d]/g, '').toString(),
            split   		    = number_string.split(','),
            sisa     		    = split[0].length % 3,
            rupiah     		    = split[0].substr(0, sisa),
            ribuan     		    = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }

        updateCart();

        function updateCart() {
            var totalCart = 0;
            $('#cartElement').empty();
            keranjangUser.map(function(data) {
                $('#cartElement').append(`
                    <tr>
                        <td class="si-pic">
                            <img src="${data.photo}" width="50" alt="" />
                        </td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>Rp. ${formatRupiah(data.price)} x ${data.qty}</p>
                                <h6>${data.name}</h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <i class="ti-close" style="cursor: pointer;" onclick="removeItem(${data.id})"></i>
                        </td>
                    </tr>
                `)
                totalCart += data.price * data.qty;
            })
            $('#cartQuantity').html(keranjangUser.length);
            $('#totalCart').html(`Rp. ${formatRupiah(totalCart)}`);
        }

        function saveKeranjang(idProduct, nameProduct, priceProduct, photoProduct, addToCart) {
            if(addToCart) {
                var checked = true;
                var qty = document.querySelector('[name="quantity"]').value;
                keranjangUser = keranjangUser.map(function(data) {
                    if(data.id == idProduct) {
                        data.qty += parseInt(qty);
                        checked = false;
                        return data;
                    }
                    return data;
                })

                if(checked) {
                    let productStored = {
                        id: idProduct,
                        name: nameProduct,
                        price: parseInt(priceProduct),
                        photo: photoProduct,
                        qty: parseInt(qty),
                    };
                    
                    keranjangUser.push(productStored);
                }
            } else {
                var checked = true;
                keranjangUser = keranjangUser.map(function(data) {
                    if(data.id == idProduct) {
                        data.qty += 1;
                        checked = false;
                        return data;
                    }
                    return data;
                })

                if(checked) {
                    let productStored = {
                        id: idProduct,
                        name: nameProduct,
                        price: priceProduct,
                        photo: photoProduct,
                        qty: 1,
                    };
                    
                    keranjangUser.push(productStored);
                }
            }
            
            const parsed = JSON.stringify(keranjangUser);
            localStorage.setItem("keranjangUser", parsed);
            updateCart()
            alert('Berhasil Menambahkan ke keranjang belanja')
            if(addToCart) {
                window.location.href = '{{ url("/cart") }}'
            }
        }

        function removeItem(idx) {
            // Cari Tahu id dari si item yang akan dihapus
            let keranjangUserStorage = JSON.parse(
                localStorage.getItem("keranjangUser")
            );
            let itemKeranjangUserStorage = keranjangUserStorage.map(
                (itemKeranjangUserStorage) => itemKeranjangUserStorage.id
            );
            // Cocokan idx item dengan id yang ada di storage
            let index = itemKeranjangUserStorage.findIndex((id) => id == idx);
            this.keranjangUser.splice(index, 1);
            const parsed = JSON.stringify(this.keranjangUser);
            localStorage.setItem("keranjangUser", parsed);
            window.location.reload();
        }
    </script>
    @stack('add-script')
</body>

</html>