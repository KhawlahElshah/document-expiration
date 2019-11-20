<script>
export default {
        data(){
            return {
                showAccountDropDown: false,
                showMobileNavbar: false,
            }
        },
        methods: {
            toggleShowAccountDropDown(){
                this.showAccountDropDown = !this.showAccountDropDown;
            },
            toggleMobileNavbar(){
                this.showMobileNavbar = !this.showMobileNavbar;
            }
        }
    }
</script>
