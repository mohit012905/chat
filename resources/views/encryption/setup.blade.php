<x-app-layout>

<!-- Dashboard Content -->

<script>
async function generateKeys() {

    const keyPair = await crypto.subtle.generateKey(
        {
            name: "RSA-OAEP",
            modulusLength: 2048,
            publicExponent: new Uint8Array([1,0,1]),
            hash: "SHA-256"
        },
        true,
        ["encrypt", "decrypt"]
    );

    console.log(keyPair);
}

generateKeys();
</script>

</x-app-layout>