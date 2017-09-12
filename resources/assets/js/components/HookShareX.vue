<template>
    <div class="container" id="shareX-data">

        <div class="modal fade" id="hook-shareX-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ShareX custom uploader</h4>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control shareX-json-message" cols="20" rows="20" readonly>{{ shareX_data | pretty }}</textarea>

                        <span class="btn btn-block btn-main" type="button" v-clipboard="shareX_data" @success="handleSuccess"><span id="shareX-copy-text">Copy</span></span>
                    </div>
                </div>
            </div>
        </div>

        <div id="shareX-open">
            <img :src="image" data-toggle="modal" data-target="#hook-shareX-modal">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['image', 'name', 'url'],
        data: function () {
            return {
                shareX_data: '{"Name": "' + this.name + '", "DestinationType": "URLShortener", "RequestType": "POST", "RequestURL": "' + this.url + '", "Arguments": { "url": "$input$" }, "ResponseType": "Text", "URL": "$json:code$" }',
            }
        },

        methods: {
            handleSuccess(e) {
                var object = this;
                object.toggleFade();

                setTimeout(function () {
                    object.toggleFade();
                }, 2000);
            },

            toggleFade() {
                $('#shareX-copy-text').stop().css('opacity', '0').html(function (_, oldText) { // Set the opacity of the div to 0 and then change the html (flip it based on last value)
                    return oldText == 'Copied!' ? 'Copy' : 'Copied!'
                }).animate({
                    opacity: 1 // Animate opacity to 1 with a duration of 2 sec
                }, 1000);
            }
        },

        filters: {
            pretty: function(value) {
                return JSON.stringify(JSON.parse(value), null, 4);
            }
        }
    }
</script>

<style>
    #shareX-open {
        position: absolute;
        right: 20px;
        top: 20px;
    }

    #shareX-open img {
        max-width: 35px;
        cursor: pointer;
    }

    .shareX-json-message {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        resize: none;
    }
</style>
