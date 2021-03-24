<template>
    <div class="text-center">dddddddddsadadasdasdasdasdasdasds
        <ul class="pagination">
            <li v-if="pagination.current_page > 1" class="page-item" aria-disabled="true" aria-label="« Vorige">
                <a class="page-link" v-on:click.prevent="changePage(pagination.current_page - 1)" aria-disabled="true" aria-label="« Vorige">‹</a>
            </li>
            <li v-else class="page-item disabled" aria-disabled="true" aria-label="« Vorige">
                <span class="page-link" aria-hidden="true">‹</span>
            </li>

            <li v-for="page in pagesNumber" :class="{'page-item active': page == pagination.current_page, 'page-item': page != pagination.current_page}">
                <a href="javascript:void(0)" v-on:click.prevent="changePage(page)">{{ page }}</a>
            </li>

            <li v-if="pagination.current_page < pagination.last_page" class="page-item">
                <a class="page-link" v-on:click.prevent="changePage(pagination.current_page + 1)" rel="next" aria-label="Volgende »">›</a>
            </li>
            <li v-else class="page-item disabled">
                <span class="page-link" aria-hidden="true">›</span>
            </li>
        </ul>
    </div>
</template>
<script>
    export default{
        props: {
            pagination: {
                type: Object,
                required: true
            },
            offset: {
                type: Number,
                default: 4
            }
        },
        computed: {
            pagesNumber() {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                let pagesArray = [];
                for (let page = from; page <= to; page++) {
                    pagesArray.push(page);
                }
                return pagesArray;
            }
        },
        methods : {
            changePage(page) {
                var base_url = window.location.origin;
                window.location.replace(''+base_url+''+window.location.pathname+'?page='+page+'')
                this.pagination.current_page = page;
            }
        }
    }
</script>
