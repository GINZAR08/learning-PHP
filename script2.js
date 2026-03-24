document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('randbtn');
  if (!btn) return;
  btn.addEventListener('click', async () => {
    const res = await fetch('index3.php?ajax=1');
    const data = await res.json();
    alert(data.names.join(', '));
  });
});

