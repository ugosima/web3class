
  <p>If your mind is curious enough, you should right now be wondering "How exactly is this so called digital ledger called a blockchain made, and why exactly is it considered secure?".

Building a blockchain from the ground up involves low-level engineering, complex cryptographic techniques, consensus mechanisms, and distributed system design, which requires deeper technical study and experience, which is beyond the scope of this course.
<br><br>

However, in this course, we will focus on helping you understand how blockchains work in practice, so you can confidently use, explore, and build on existing systems.

<br><br>
    
    {{-- In the digital age, cryptography and cryptocurrency are becoming increasingly important, especially as the world moves toward decentralized systems, blockchain-based platforms, and digital finance. While they are often mentioned together, they are not the same thing. However, they are <em>deeply connected</em>.</p> --}}


    <p>
If blockchains are designed to be secure and trustworthy, the next question is simple. What exactly makes them secure?
</p>

<p>
The answer lies in a concept called cryptography.
</p>
<br><br>


  <h2>What is Cryptography?</h2>
<p>
Cryptography is the use of mathematical techniques to protect information, ensuring that data cannot be easily altered, forged, or accessed by unauthorized parties. Its goal is to secure communication and ensure that only intended recipients can understand the message or access the data.
</p>
<br>

<h2>Key cryptographic concepts in blockchain</h2>

<p>
To understand how blockchain achieves security, there are a few important cryptographic ideas you need to know. Each of these plays a specific role in how the system works.
</p>

<h3 class="font-semibold">1. hashing</h3>
<p>
Hashing is the process of converting data into a fixed-length string of characters, often called a hash. This process is designed so that even a small change in the original data produces a completely different result.
</p>

<p>
In blockchains, hashing is used to link blocks together. Each block contains the hash of the previous block, which creates a chain. If someone tries to change any past data, the hashes will no longer match, making the change obvious to the network.
</p>
<br>

<h3 class="font-semibold">2. public and private keys</h3>
<p>
Blockchain systems use a pair of keys to manage identity and ownership. A private key is kept secret and is used to approve transactions, while a public key is shared with others and is used to receive assets.
</p>

<p>
This system allows users to prove ownership and control over their assets without revealing sensitive information.
</p>
<br>

<h3 class="font-semibold ">3. digital signatures</h3>
<p>
Digital signatures are created using a user’s private key and are used to prove that a transaction was genuinely authorized by the owner.
</p>

<p>
When a transaction is sent, the network can verify the signature using the corresponding public key, ensuring that the transaction has not been tampered with and was sent by the correct person.
</p>
<br>

<h3 class="font-semibold ">4. immutability through cryptography</h3>
<p>
One of the key strengths of blockchain is that once data is recorded, it becomes extremely difficult to change. This property is known as immutability.
</p>

<p>
Immutability is achieved by combining hashing and block linking. Since each block depends on the previous one, altering any single record would require changing every block after it, which is practically impossible in a large network.
</p>
<br>

<p>
Cryptography is the foundation of blockchain security. It allows the system to:
</p>

<ol class="list-disc space-y-2 list-inside">
    <li>protect data from unauthorized changes</li>
    <li>verify transactions without needing trust</li>
    <li>prove ownership using keys and signatures</li>
    <li>maintain a permanent and secure record of activity</li>
</ol>


    <br>
  <h2>Types of Cryptography</h2>
  <ol class="pl-3 list-inside list-[lower-roman]">
    <li><strong>Symmetric Encryption:</strong> Uses the same key to encrypt and decrypt data.</li>
    <li><strong>Asymmetric Encryption:</strong> Uses a public and private key pair.</li>
  </ol>
<br>
  <p>
    Symmetric encryption is faster and suitable for encrypting large amounts of data, while asymmetric encryption is more secure and is used for key exchange and digital signatures. Both types of cryptography are essential for cryptocurrencies, providing the necessary security and trust mechanisms.
    <br>
  </p>
  <br>

    <div class="quickbox">
     <h2 class="qbheading"><b class="ideabulb">&#128161; </b> <b class="qbheading"> NOTEWORTHY</b> </h2>
    <br>
    <p>Cryptography is essential in Web3 and blockchain studies. However, deeper knowledge of cryptography should be sourced through dedicated academic texts and research, which are again beyond the scope of this lesson.</p>
    </div>





  <br><br>
  <h2>What is Cryptocurrency?</h2>
  <p>Cryptocurrency is a type of digital or virtual currency that uses cryptography to secure transactions, control the creation of new units, and validate asset transfers. At its core, it is a reward system for nodes participating in a blockchain.</p>
<br><br>

  <h2>Relationship between Cryptography and Cryptocurrency</h2>
  <p>Cryptography makes cryptocurrency possible. Without cryptography, cryptocurrencies would be easy to counterfeit, vulnerable to fraud, and impossible to verify. Therefore, cryptography provides the foundation for the security, integrity, and trustworthiness of cryptocurrencies.
    <br>
    <br>
    Cryptography enables cryptocurrencies through several key concepts and technologies. Here's how they work together and the benefits cryptography provides:
</p>
<br>
<div class="pl-3">
  <h3>1. Digital Signatures</h3>
  <p class="pl-2">When someone sends cryptocurrency, they must prove ownership of the funds using a <strong>private key</strong>.
  <ul class="indent-2 list-inside">
    <li>A <strong>digital signature</strong> is created using cryptographic algorithms and verified by others using the sender's <strong>public key</strong>.</li>
    <li>
      This ensures authenticity without revealing the private key. It's like signing a check, but mathematically and in a way that cannot be forged.
    </li>
  </ul>
  </p>
  <br>



  <h3>2. Hash Functions</h3>
  <p>A hash function converts input into a fixed-length string. It is one-way and impossible to reverse; even small changes in input create vastly different outputs.</p>
  <ol class="indent-3 list-inside list-[lower-roman]">
    <li><b>Use cases:</b></li>
    <li>Generation of transaction IDs</li>
    <li>Block verification</li>
    <li>Proof-of-Work (e.g., mining)</li>
  </ol>
   <p>These special functions are only possible through cryptography.</p>



  <br>
  <h3>3. Wallets and Key Pairs</h3>
  <p>A crypto wallet stores your keys, not your money.</p>
  <ol class="indent-3 list-inside">
    <li><strong>Public Key:</strong> Like a bank account number that you can share publicly.</li>
    <li><strong>Private Key:</strong> Like your ATM PIN—never share this with anyone.</li>
  </ol>
  <p>These special keys are generated using cryptographic algorithms, ensuring that only the owner can access their funds.</p>

  <br>
  <h3>4. Secure Transactions on the Blockchain</h3>
  <p>Each cryptocurrency transaction is encrypted, signed, and verified using cryptographic functions. The blockchain network itself serves as the trust layer—no banks needed.</p>
  <br>



  <h3>5. Consensus Mechanisms</h3>
  <p>Cryptocurrencies use consensus mechanisms to agree on and validate transactions:</p>
  <ol class="indent-3 list-inside list-[lower-roman]">
    <li><strong>Proof of Work (PoW):</strong> Mining using computational puzzles.</li>
    <li><strong>Proof of Stake (PoS):</strong> Validators hold coins to propose and validate blocks.</li>
  </ol>
<br>
</div>


  <br>
  <h2>Challenges of Cryptocurrency</h2>
  <ol class="indent-3 list-inside list-[lower-roman] space-y-2">
    <li><strong>Key Loss:</strong> Losing your private keys means losing access to your funds permanently, with no way to recover them.</li>
    <li><strong>User Error:</strong> Decentralization means there's no central authority to recover lost or misplaced funds.</li>
    <li><strong>Scalability:</strong> Some blockchains process transactions slowly and require enormous resources to scale effectively.</li>
    <li><strong>Quantum Threat:</strong> Advances in quantum computing could potentially break current encryption. This is an anticipated long-term security concern.</li>
  </ol>

  <br>

  <h2>Summary</h2>
  <p>Cryptography and cryptocurrency are inseparable. One is the science of security, and the other is the practical application of that science to digital money. Together, they enable a new era of digital finance.</p>
