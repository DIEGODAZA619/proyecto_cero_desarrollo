<!--main content start-->

<?php
redirect('plans');
?>

<section id="saque" class="d-flex justify-content-center align-items-center py-5 mt-3 my-auto">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-xl-12 p-3">
        <div class="text-center position-relative d-flex align-items-center justify-content-center">
          <img src="<?php echo base_url(); ?>/assets/template/images/arrow_orange.png" alt="flecha" class=" img-fluid position-absolute start-0" width="100">
          <h1 class="display-5 text-white fw-bold w-50">Invoices</h1>
        </div>
        <div id="msj" class="alert alert-bg-danger"></div>
        <div class="content py-4 px-4 position-relative">
          <?php if (isset($message)) echo $message; ?><br><br>
          <div class="detalle w-100 position-relative ">
            <table id="tblDateEx" width='100%' class="w-100">
              <thead class="">
                <tr>
                  <th># Invoices</th>
                  <th>Plan</th>
                  <th>Price (USD)</th>
				  <th>Check on Etherscan</th>	
                  <th>State</th>
                  <th>Voucher</th>
              
                </tr>
              </thead>
              <tbody>
                <?php

                if ($faturas !== false) {

                  foreach ($faturas as $fatura) {

                ?>
                    <tr>
                      <td>#<?php echo $fatura->id_fatura; ?></td>
                      <td><?php echo $fatura->nome; ?></td>
                      <td id="priceUsd">
                        <p><?php echo $fatura->valor; ?></p>
                      </td>
						
					  <td id="comprobanteInvoice">
						  <?php $comprobante = $fatura->comprovante; ?>
						  
						  <a href="https://etherscan.io/tx/<?php echo $comprobante?>" target="_blank">
						  	<?php echo $comprobante?>	
						  </a>	
					   </td>	
						
                      <td><span class="label v label-mini"><?php echo ($fatura->status == 0) ? 'Pending' : 'Released'; ?></span></td>

                      <td>
                        <?php echo ($fatura->comprovante == '') ? '<button class="badge btn-primario" onclick="send(' . number_format($fatura->valor) . ')">MAKE THE PAYMENT</button>' : 'Confirmed payment'; ?>
                      </td>
                    </tr>
                <?php
                  }
                }
                ?>

              </tbody>
            </table>




          </div>
        </div>

      </div>
    </div>
  </div>
</section>

















<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>

<script src="https://unpkg.com/@metamask/detect-provider/dist/detect-provider.min.js"></script>







<?php


$url = "https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=ETH&api_key=2d7ace049cf4f13f3468b8e80e5b1ab8c7d7bf50abec7178570402e1e10445ba";
$data = json_decode(file_get_contents($url), true);
$latest_price = $data['ETH'];

?>
<input type="hidden" id="latestPrice-ETH" value="<?php echo $latest_price; ?>">

<?php
$url = "https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=BNB&api_key=2d7ace049cf4f13f3468b8e80e5b1ab8c7d7bf50abec7178570402e1e10445ba";
$data = json_decode(file_get_contents($url), true);
$latest_price = $data['BNB'];
?>
<input type="hidden" id="latestPrice-BNB" value="<?php echo $latest_price; ?>">

<script>
  async function connectWallet() {
    accounts = await window.ethereum.request({
      method: "eth_requestAccounts"
    }).catch((err) => {

      console.log(err.code);
      console.log(err.message);
      var msj = document.getElementById('msj');
      msj.innerHTML = err.message;
    });
    $('#cpf').val(accounts[0]);
    // console.log(accounts);
  }




  connectWallet();
  window.onload = function() {
    if (window.ethereum !== "undefined") {
      this.ethereum.on("accountsChanged", handleAccountsChanged)
    }
  }


  let accounts;

  const handleAccountsChanged = (a) => {
    accounts = a;
    // $('#cpf').val(accounts[0]);

  }













  async function ethTestnetNetwork() {
    try {
      await ethereum.request({
        method: 'wallet_switchEthereumChain',
        params: [{
          chainId: '0x4'
        }], // Hexadecimal version of 80001, prefixed with 0x
      });
    } catch (error) {
      if (error.code === 4902) {
        try {
          await ethereum.request({
            method: 'wallet_addEthereumChain',
            params: [{
              chainId: '0x4', // Hexadecimal version of 80001, prefixed with 0x
              chainName: "homestead",
              nativeCurrency: {
                name: "ETH",
                symbol: "ETH",
                decimals: 18,
              },
              rpcUrls: ["https://mainnet.infura.io/v3/9aa3d95b3bc440fa88ea12eaa4456161"],
              blockExplorerUrls: ["https://etherscan.io"],
              iconUrls: [""],

            }],
          });
        } catch (addError) {
          console.log('Did not add network');
        }
      }
    }
  }
  ethTestnetNetwork();





  async function send(valor) {



    let priceEth = document.getElementById('latestPrice-ETH').value;

    let resultado = priceEth * valor;


    const weiValue = resultado.toString();
    const ethValue = ethers.utils.parseEther(weiValue);
    let price = ethers.utils.hexlify(ethValue)






    let params = [{
      "from": accounts[0],
      "to": "0x63788f7F4D6a2c5d0A1fdb0E4977cdfF9C365004",
      "value": price,

    }]

    let result = await window.ethereum.request({
        method: "eth_sendTransaction",
        params


      })
      .then((txHash) =>


        $.ajax({
          type: "post",
          url: "<?php echo  base_url() ?>pay",
          data: {
            "hash": txHash
          },

          success: function(response) {
            window.location.reload();
          }
        })


      )
      .catch((err) => {

        console.log(err.code);
      });


  }
</script>