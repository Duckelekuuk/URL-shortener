<template>
    <div class="toggle-theme-button">
        <toggle-button
                :value="true"
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
                toggled: true,
            }
        },

        methods: {
            onChangeEventHandler(event) {
                this.toggled = event.value;

                if (this.toggled) {
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
