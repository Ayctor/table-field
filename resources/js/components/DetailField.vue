<template>
    <panel-item :field="field">
        <template slot="value">
            <div class="w-full overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full border border-collapse">
                        <thead>
                            <tr>
                                <th class="p-2 border text-left" v-for="(column, index) in data[0]" :key="index">
                                    {{ column }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in data" :key="index">
                                <td class="p-2 border" v-for="(column, subindex) in row" :key="subindex" v-if="index !== 0">
                                    {{ column }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </template>
    </panel-item>
</template>

<script>
    export default {
        props: ['resource', 'resourceName', 'resourceId', 'field'],
        computed: {
            data() {
                return JSON.parse(this.field.value);
            },
        },
    };
</script>
