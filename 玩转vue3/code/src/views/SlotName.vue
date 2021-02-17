<template>
    <div class="slot-name">
        <ht>
            <template #header>
                <headl></headl>
            </template>
            <template #body>
                <fbody></fbody>
            </template>
            <template #footer>
                <foot></foot>
            </template>
        </ht>
    </div>
</template>

<script>
import ht from './Ht';
import headl from './Header';
import foot from './Footer';
import fbody from './Fbody';
export default {
    name:'slotName',
    components:{
        ht,
        headl,
        foot,
        fbody
    }
}
</script>