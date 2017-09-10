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

        <div class="modal fade bd-example-modal-lg" id="create-link-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="input-group">
                            <input class="form-control" :value="result" readonly>

                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" v-clipboard="result">Copy</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">

                <form @submit.prevent="createLink">
                    <div class="col-sm-10">
                        <input class="form-control" required v-model="url" placeholder="https://google.com"/>
                    </div>

                    <input type="submit" value="Create" class="btn btn-info col-sm-2">
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
                this.axios.post('/api/create', {url : this.url}).then(response => {
                    if (response.data.success) {
                        this.result = response.data.code;
                        this.errors = [];
                        this.url = '';
                        $('#create-link-modal').modal();
                    } else {
                        this.result = '';
                        this.errors = response.data.errors.url;
                    }
                });
            }
        }
    }
</script>
