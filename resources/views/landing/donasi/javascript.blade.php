<script type="text/javascript">
    $.fn.serializeObject = function(){
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    function blockPage(message = 'Mohon menunggu...'){
        $.blockUI({
            message: `<div class="blockui-message" style="z-index: 9999"><span class="spinner-border text-primary"></span> ${message} </div>`,
            css: {
                border: 'none',
                backgroundColor: 'rgba(47, 53, 59, 0)',
                'z-index': 9999
            }
        });
    }

    function unblockPage(delay = 500){
        window.setTimeout(function () {
            $.unblockUI();
        }, delay);
    }

    function submit_donasi(){
        // Kalau ada donasi manual, dan nominalnya di bawah 10rb
        if($('#inputNominal').val() < 10000){
            $.confirm({
                title: 'Gagal',
                content: 'Nominal donasi minimal Rp10.000',
                theme: 'material',
                type: 'red',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                    }
                }
            });
            return;
        }

        if(jQuery.isEmptyObject($('#inputNominal').val())){
            $.confirm({
                title: 'Gagal',
                content: 'Silakan pilih atau isi nominal',
                theme: 'material',
                type: 'red',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                    }
                }
            });
            return;
        }

        $.confirm({
            title: 'Donasi',
            content: 'Apa Anda yakin ingin mengirimkan donasi ini?',
            theme: 'material',
            type: 'blue',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function () {
                        blockPage();
                        $.ajax({
                            type: "POST",
                            url: '{{ route('pembayaran') }}',
                            data: $('[name=form_donasi]').serializeObject(),
                            headers:{
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            success: function(res){
                                if (res.success == true) {
                                    // $.confirm({
                                    //     title: 'Sukses',
                                    //     content: 'Berhasil mengirimkan donasi',
                                    //     theme: 'material',
                                    //     type: 'blue',
                                    //     buttons: {
                                    //         ok: {
                                    //             text: "ok!",
                                    //             btnClass: 'btn-primary',
                                    //             keys: ['enter'],
                                    //         }
                                    //     }
                                    // });
                                    unblockPage();
                                    // var authWindow = window.open(res.transaction.payment_link, '_blank', 'width=500,height=600');
                                    $.confirm({
                                        title: 'Donasi diproses',
                                        content: 'Donasi Anda sedang diproses, silakan klik ok untuk menuju halaman pembayaran',
                                        theme: 'material',
                                        type: 'blue',
                                        buttons: {
                                            ok: {
                                                text: "ok!",
                                                btnClass: 'btn-primary',
                                                keys: ['enter'],
                                                action: function () {
                                                    window.location.href = '{{ $base_url }}'+res.token;
                                                }
                                            }, cancel: function () {
                                                $.confirm({
                                                    title: 'Batal',
                                                    content: 'Batal mengirimkan donasi',
                                                    theme: 'material',
                                                    type: 'red',
                                                    buttons: {
                                                        ok: {
                                                            text: "ok!",
                                                            btnClass: 'btn-primary',
                                                            keys: ['enter'],
                                                            action: function () {
                                                                // window.location.href = '';
                                                                cancel_payment(res.order_id);
                                                            }
                                                        }
                                                    }
                                                });
                                            }
                                        }
                                    });
                                } else {
                                    $.confirm({
                                        title: 'Gagal',
                                        content: 'Gagal mengirimkan donasi',
                                        theme: 'material',
                                        type: 'red',
                                        buttons: {
                                            ok: {
                                                text: "ok!",
                                                btnClass: 'btn-primary',
                                                keys: ['enter'],
                                            }
                                        }
                                    });
                                    unblockPage();
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(thrownError);
                                $.confirm({
                                    title: 'Gagal',
                                    content: thrownError,
                                    theme: 'material',
                                    type: 'red',
                                    buttons: {
                                        ok: {
                                            text: "ok!",
                                            btnClass: 'btn-primary',
                                            keys: ['enter'],
                                        }
                                    }
                                });
                                unblockPage();
                            }
                        });
                    }
                }, cancel: function () {
                    $.confirm({
                        title: 'Batal',
                        content: 'Batal mengirimkan donasi',
                        theme: 'material',
                        type: 'red',
                        buttons: {
                            ok: {
                                text: "ok!",
                                btnClass: 'btn-primary',
                                keys: ['enter'],
                            }
                        }
                    });
                }
            }
        });
    }

    function cancel_payment(order_id){
        $.ajax({
            url: '{{ route('pembatalan') }}',
            type: 'POST',
            data: {order_id: order_id},
            headers:{
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            success: function(res) {
                if(res.success == true){
                    return true;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
                return false;
            }
        });
    }

    function formatnumber(){
        const formattedInput = document.getElementById('formattedNominal');
        const hiddenInput = document.getElementById('inputNominal');

        formattedInput.addEventListener('input', function () {
            let rawValue = this.value.replace(/\D/g, ''); // Remove all non-digits
            if (rawValue) {
                this.value = new Intl.NumberFormat('id-ID').format(rawValue); // Format with dot separator
                hiddenInput.value = rawValue; // Store raw number in hidden input
            } else {
                this.value = '';
                hiddenInput.value = '';
            }
        });
    }

</script>
