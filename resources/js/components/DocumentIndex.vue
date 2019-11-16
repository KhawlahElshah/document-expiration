<script>
    export default {
        data(){
            return {
                selectedTab: "expired"
            }
        },
        methods: {
            RedirectToDocumentForm(category){
                window.location.href = `/categories/${category}/documents/create`;
            }
        },
    }
</script>
