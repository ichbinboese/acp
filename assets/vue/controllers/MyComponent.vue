<template>
    <div class="container">
        <h1>{{ name }}</h1>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                </tr>
                <tr>
                    <td>Cell 1 - 1</td>
                    <td>Cell 1 - 2</td>
                    <td>Cell 1 - 3</td>
                </tr>
                <tr>
                    <td>Cell 2 - 1</td>
                    <td>Cell 2 - 2</td>
                    <td>Cell 2 - 3</td>
                </tr>
                <tr>
                    <td>Cell 3 - 1</td>
                    <td>Cell 3 - 2</td>
                    <td>Cell 3 - 3</td>
                </tr>
            </table>
    </div>
</template>

<script setup>
    defineProps({
        name: String
    });
</script>