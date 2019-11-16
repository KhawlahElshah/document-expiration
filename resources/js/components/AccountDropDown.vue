<script>
export default {
        data(){
            return {
                showAccountDropDown: false
            }
        },
        methods: {
            toggleShowAccountDropDown(){
                console.log('dsfsd');
                this.showAccountDropDown = !this.showAccountDropDown;
            }
        }
    }
</script>
