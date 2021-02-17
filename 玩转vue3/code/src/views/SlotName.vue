<template>
    <div class="slot-name">
        <ht>
            <template #[h1]>
                <headl></headl>
            </template>
            <template #[b1]>
                <fbody></fbody>
            </template>
            <template #[c1]>
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
    },
    data(){
        return{
            h1:'header',
            b1:'body',
            c1:'footer'
        }
    }
}
</script>