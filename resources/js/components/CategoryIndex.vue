<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            RedirectToDocumentForm(category){
                window.location.href = `/categories/${category}/documents/create`;
            }
        },
    }
</script>
