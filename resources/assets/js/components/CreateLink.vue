<template>
    <div class="container">
        <div class="row" v-if="errors.length > 0">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-danger">
                    <ul class="text-white">
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="modal fade" id="create-link-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Result data</h4>
                    </div>
                    <div class="modal-body">
                        <input class="form-control create-link-input" :value="result" readonly>

                        <span class="btn btn-block btn-main" type="button" v-clipboard="result" @success="handleSuccess"><span id="create-link-copy-text">Copy</span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">

                <form @submit.prevent="createLink">
                    <div class="col-sm-12">
                        <input class="form-control" required v-model="url" placeholder="https://google.com"/>
                    </div>

                    <input type="submit" value="Create" class="btn col-sm-6 col-sm-push-3 btn-main btn-create">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                url: '',
                result: '',
                errors: []
            }
        },
        
        methods: {
            createLink() {
                this.axios.post('/api/create', {destination : this.url}).then(response => {
                    if (response.data.success) {
                        this.result = response.data.code;
                        this.errors = [];
                        this.url = '';
                        $('#create-link-modal').modal();
                    } else {
                        this.result = '';
                        this.errors = response.data.errors.destination;
                    }
                });
            },

            handleSuccess(e) {
                var object = this;
                object.toggleFade();

                setTimeout(function () {
                    object.toggleFade();
                }, 2000);
            },

            toggleFade() {
                $('#create-link-copy-text').stop().css('opacity', '0').html(function (_, oldText) { // Set the opacity of the div to 0 and then change the html (flip it based on last value)
                    return oldText == 'Copied!' ? 'Copy' : 'Copied!'
                }).animate({
                    opacity: 1 // Animate opacity to 1 with a duration of 2 sec
                }, 1000);
            }
        }
    }
</script>

<style lang="scss">
    .create-link-input {
        font-size: 18px;
        height: 50px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .btn-create {
        padding: 2px 24px;
        margin-top: 18px;
    }
</style>
