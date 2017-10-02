<template>
    <div class="toggle-theme-button">
        <toggle-button
                :value="darkTheme"
                :color="{checked: '#CFCFCF', unchecked: '#00bc8c'}"
                :width="100"
                :height="30"
                :labels="{checked: 'Dark theme', unchecked: 'Light theme'}"
                @change="onChangeEventHandler">
        </toggle-button>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                darkTheme: true,
            }
        },

        created() {
            this.darkTheme = Vue.cookie.get('dark-theme') === 'true' || Vue.cookie.get('dark-theme') == null;
        },

        methods: {
            onChangeEventHandler(event) {
                this.darkTheme = event.value;

                Vue.cookie.set('dark-theme', this.darkTheme, 30);

                if (this.darkTheme) {
                    $('body').removeClass('light-theme')
                } else {
                    $('body').addClass('light-theme')
                }
            }
        },
    }
</script>

<style>
    .toggle-theme-button {
        position: absolute;
        left: 20px;
        top: 20px;
    }
</style>
